<?php
include("conexion.php");
session_start();

if (!isset($_SESSION['id_cliente'])) {
  header('location: index.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['eliminar'])) {
    // Eliminar la cuenta del usuario
    $iduser = $_SESSION['id_cliente'];
    $sql = "DELETE FROM clientes WHERE id_cliente = '$iduser'";
    $resultado = $conexion->query($sql);

    if ($resultado) {
      // Redirigir a la página de inicio o mostrar un mensaje de éxito
      header('location: index.php');
      exit;
    } else {
      // Mostrar un mensaje de error en caso de fallo en la eliminación
      $error_message = "Error al eliminar la cuenta. Inténtalo de nuevo.";
    }
  } else {
    // Obtener los valores actualizados de los campos
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $contrasena = $_POST['contrasena'];
    $direccion = $_POST['direccion'];

    // Actualizar los datos en la base de datos
    $iduser = $_SESSION['id_cliente'];
    $sql = "UPDATE clientes SET nombre='$nombre', apellido='$apellido', contrasena='$contrasena', direccion='$direccion' WHERE id_cliente = '$iduser'";
    $resultado = $conexion->query($sql);

    if ($resultado) {
      // Redirigir a la página de perfil o mostrar un mensaje de éxito
      header('location: perfil.php?id=' . $iduser);
      exit;
    } else {
      // Mostrar un mensaje de error en caso de fallo en la actualización
      $error_message = "Error al actualizar los datos. Inténtalo de nuevo.";
    }
  }
}

$iduser = $_SESSION['id_cliente'];
$sql = "SELECT id_cliente, nombre, apellido, contrasena, direccion FROM clientes WHERE id_cliente = '$iduser'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();
?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-dark">
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="principal.php">TuTiendita</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-light" href="principal.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="perfil.php?id=<?php echo $_SESSION['id_cliente']; ?>">Editar Perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="cerrarsesion.php">Salir</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<div class="container">
  <br><br>

  <h1 class="text-center text-light">Editar perfil</h1>
  <br><br><br>
  <div class="row justify-content-center">
    <div class="col-md-6">
      <br>
      <form action="" method="post">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="text-center">
            <label for="name" class="fs-5 text-center text-light">Nombre</label>
          </div>
          <input type="text" name="nombre" class="form-control text-light bg-secondary rounded-4 border-2 border border-danger" value="<?php echo $row['nombre']; ?>" required="">
        </div>
      </div>
      <br>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="text-center">
            <label for="lastname" class="fs-5 text-center text-light">Apellido</label>
          </div>
          <input type="text" name="apellido" class="form-control text-light bg-secondary rounded-4 border-2 border border-danger" value="<?php echo $row['apellido']; ?>" required="">
        </div>
      </div>
      <br>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="text-center">
            <label for="password" class="fs-5 text-center text-light">Contraseña</label>
          </div>
          <div class="input-group">
            <input type="password" name="contrasena" id="passwordInput" class="form-control text-light bg-secondary rounded-4 border-2 border border-danger" value="<?php echo $row['contrasena']; ?>" required="">&ensp;
            <button type="button" id="togglePassword" class="btn btn-secondary rounded-4 border-2 border border-danger">
              <i id="eyeIcon" class="bi bi-eye"></i>
            </button>
          </div>
        </div>
      </div>
      <br>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="text-center">
            <label for="address" class="fs-5 text-center text-light">Dirección</label>
          </div>
          <input type="text" name="direccion" class="form-control text-light bg-secondary rounded-4 border-2 border border-danger" value="<?php echo $row['direccion']; ?>" required="">
        </div>
      </div>
      <br><br>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="text-center">
            <button type="submit" class="form-control btn btn-danger text-light rounded-4 border-black border-3" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: 7.0rem; --bs-btn-font-size: 1.25rem;">Actualizar</button>
            <br><br><br>
          </div>
        </div>
      </div>
      </form>
      <br>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="text-center">
          <label for="name" class="fs-5 text-center text-light">Deseas Eliminar tu cuenta?</label>
            <form action="" method="post" onsubmit="return confirm('¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.')">
              <button type="submit" name="eliminar" class="form-control btn btn-danger text-light rounded-4 border-black border-3" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: 7.0rem; --bs-btn-font-size: 1.25rem;">Eliminar cuenta</button>
              <br><br>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<script>
  document.getElementById("togglePassword").addEventListener("click", function() {
    var passwordInput = document.getElementById("passwordInput");
    var eyeIcon = document.getElementById("eyeIcon");

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      eyeIcon.classList.remove("bi-eye");
      eyeIcon.classList.add("bi-eye-slash");
    } else {
      passwordInput.type = "password";
      eyeIcon.classList.remove("bi-eye-slash");
      eyeIcon.classList.add("bi-eye");
    }
  });
</script>
</body>
</html>
