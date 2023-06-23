<?php
include("conexion.php");

$alerta = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los valores del formulario
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $contrasena = $_POST['contrasena'];
  $direccion = $_POST['direccion'];

  // Verificar si todos los campos están completos
  if (!empty($nombre) && !empty($apellido) && !empty($contrasena) && !empty($direccion)) {
    // Insertar los datos en la base de datos
    $sql = "INSERT INTO clientes (nombre, apellido, contrasena, direccion) VALUES ('$nombre', '$apellido', '$contrasena', '$direccion')";
    if ($conexion->query($sql) === TRUE) {
      $mensaje = "Cliente creado exitosamente";
      // Redireccionar a index.php si el cliente se creó correctamente
      header("Location: index.php");
      exit();
    } else {
      $alerta = "Error al crear el cliente: ";
    }
  } else {
    $alerta = "Por favor, complete todos los campos";
  }
}
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
        }
    </style>
  </head>
  <body class="bg-dark">
    <div class="container">
      <br><br><br><br><br>
      <h1 class="text-center text-light">Registrate</h1>
      <br><br><br>
      <div class="row justify-content-center">
        <div class="col-md-6">
        <?php if($alerta): ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $alerta; ?>
          </div>
        <?php endif; ?>

          <form action="" method="post">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="text-center">
                <label for="name" class="fs-5 text-center text-light">Nombre</label>
              </div>
              <input type="text" name="nombre" class="form-control bg-secondary rounded-4 border-2 border border-danger" placeholder="Ingrese su nombre">
            </div>
          </div>
          <br>
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="text-center">
                <label for="lastname" class="fs-5 text-center text-light">Apellido</label>
              </div>
              <input type="text" name="apellido" class="form-control bg-secondary rounded-4 border-2 border border-danger" placeholder="Ingrese su apellido">
            </div>
          </div>
          <br>
          <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="text-center">
                  <label for="password" class="fs-5 text-center text-light">Contraseña</label>
                </div>
                <div class="input-group">
                  <input type="password" name="contrasena" id="passwordInput" class="form-control text-light bg-secondary rounded-4 border-2 border border-danger" placeholder="Ingrese una contraseña">&ensp;
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
              <input type="text" name="direccion" class="form-control bg-secondary rounded-4 border-2 border border-danger" placeholder="Ingrese su dirección">
            </div>
          </div>
          <br><br><br>

          <div class="text-center">
            <button type="submit" class="btn btn-danger rounded-4 border-black border-3" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: 7.0rem; --bs-btn-font-size: 1.25rem;">Crear Cuenta</button>
          </div>
          <br><br>
          <p class="text-center text-light fs-4">¿Ya tienes cuenta? <a class="text-light" href="index.php">Inicia Sesión</a></p>
        </div>
      </div>
    </div>
    </form>
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
