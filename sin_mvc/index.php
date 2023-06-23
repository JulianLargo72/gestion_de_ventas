<?php
include "conexion.php";
session_start();
$alerta = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['nombre']) && isset($_POST['contrasena'])) {
    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM clientes WHERE nombre = '$nombre' AND contrasena = '$contrasena'";
    $query = mysqli_query($conexion, $sql);
    if ($query === false) {
      echo "Error: " . mysqli_error($conexion);
      exit;
    }

    if (mysqli_num_rows($query) > 0) {
      $cliente = mysqli_fetch_assoc($query);
      $_SESSION['id_cliente'] = $cliente['id_cliente'];
      header('Location: principal.php');
      exit;
    } else {
      $alerta = "Nombre o contraseña incorrectos.";
    }
  }
}
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión</title>
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
        <h1 class="text-center text-light">INICIAR SESIÓN</h1>
        <br><br><br><br>
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
                    <label for="username" class="fs-5 text-center text-light">Nombre</label>
                  </div>
                  <input type="text" name="nombre" class="form-control bg-secondary text-light rounded-4 border-2 border border-danger" placeholder="Jorgito 02">
                </div>
              </div>
              <br>
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <div class="text-center">
                    <label for="password" class="fs-5 text-center text-light">Contraseña</label>
                  </div>
                  <div class="input-group">
                    <input type="password" name="contrasena" id="passwordInput" class="form-control text-light bg-secondary rounded-4 border-2 border border-danger" placeholder="Ingrese una contraseña">
                    <button type="button" id="togglePassword" class="btn btn-secondary rounded-4 border-2 border border-danger">
                      <i id="eyeIcon" class="bi bi-eye"></i>
                    </button>
                  </div>
                </div>
              </div>
              <br><br><br>
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <div class="text-center">
                    <button type="submit" class="form-control btn btn-danger text-light rounded-4 border-black border-3" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: 7.0rem; --bs-btn-font-size: 1.25rem;">Iniciar sesión</button>
                  </div>
                </div>
              </div>
              <br><br><br>
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <p class="text-center text-light fs-4">¿No tienes cuenta? <a class="text-light" href="registro.php">Registrate</a></p>
                </div>
              </div>
            </form>
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
