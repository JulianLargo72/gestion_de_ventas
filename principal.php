<?php
include "conexion.php";
session_start();

if (!isset($_SESSION['id_cliente'])) {
  header('Location: index.php');
  exit;
}

$iduser = $_SESSION['id_cliente'];
$sql = "SELECT id_cliente, nombre, apellido FROM clientes WHERE id_cliente = '$iduser'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();

// Acceder a los datos del cliente
$id_cliente = $row['id_cliente'];
$nombre = $row['nombre'];
$apellido = $row['apellido'];

// Consulta para obtener los datos de la tabla "productos"
$sql_productos = "SELECT id_producto, nombre, precio, stock, imagen FROM productos";
$resultado_productos = $conexion->query($sql_productos);
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tienda</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
  <br><br><br>
  <div class="container">
    <h1 class="text-center display-4 text-light">Bienvenid@  <?php echo utf8_decode($row['nombre']) . ' ' . utf8_decode($row['apellido']); ?> a la pagina de tu tiendita!</h1>
    <br>
    <div class="row">
      <?php while ($row_productos = $resultado_productos->fetch_assoc()) { ?>
        <div class="col-12 col-md-6 col-lg-4 mx-auto">
          <div class="card mb-4 bg-dark">
            <h5 class="card-title text-center text-light"><?php echo $row_productos['nombre']; ?></h5>
            <img src="<?php  echo $row_productos['imagen']; ?>" class="card-img-top border border-danger border-5" alt="Imagen 1">
            <div class="card-body d-flex align-items-center">
              <h6 class="card-subtitle mb-2 text-center text-light">&emsp;&emsp;<?php echo '$' . $row_productos['precio']; ?></h6>
              <div class="ms-auto">
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#detalleProductoModal<?php echo $row_productos['id_producto']; ?>" data-producto-id="<?php echo $row_productos['id_producto']; ?>">
                  <i class="bi bi-cart2"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="detalleProductoModal<?php echo $row_productos['id_producto']; ?>" tabindex="-1" aria-labelledby="detalleProductoModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content bg-dark">
              <div class="modal-header">
                <h5 class="modal-title text-light" id="detalleProductoModalLabel">Detalles del Producto</h5>
                <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label class="text-light" for="nombreProducto">Nombre:</label>
                  <input type="text" class="form-control text-light bg-secondary rounded-4 border-2 border border-danger" id="nombre<?php echo $row_productos['id_producto']; ?>" value="<?php echo $row_productos['nombre']; ?>" readonly>
                </div>
                <div class="form-group">
                  <label class="text-light" for="precioProducto">Precio:</label>
                  <input type="text" class="form-control text-light bg-secondary rounded-4 border-2 border border-danger" id="precio<?php echo $row_productos['id_producto']; ?>" value="<?php echo $row_productos['precio']; ?>" readonly>
                </div>
                <div class="form-group">
                  <label class="text-light" for="stockProducto">Stock:</label>
                  <input type="text" class="form-control text-light bg-secondary rounded-4 border-2 border border-danger" id="stock<?php echo $row_productos['id_producto']; ?>" value="<?php echo $row_productos['stock']; ?>" readonly>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger rounded-4 border-black border-3" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>