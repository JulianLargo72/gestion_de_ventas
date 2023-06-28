<?php
    include_once '../controllers/Producto.control.php';

    // Verificar si se ha proporcionado un ID de producto válido
    if (isset($_GET['id_producto'])) {
        $id_producto = $_GET['id_producto'];

        // Crear una instancia de la clase ProductoControl
        $producto_obj = new ProductoControl();
        // Obtener el objeto del producto seleccionado
        $producto = $producto_obj->select_producto($id_producto);
    } else {
        // Redireccionar a la página principal si no se proporciona un ID válido
        header('Location: list_productos.php');
        exit();
    }
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <div class="container">
        <h1 class="text-light">Detalles del Producto</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label text-light">ID:</label>
                <input type="text" class="form-control" value="<?php echo $producto->getIdProducto(); ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label text-light">Nombre:</label>
                <input type="text" class="form-control" value="<?php echo $producto->getNombre(); ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label text-light">Precio:</label>
                <input type="text" class="form-control" value="<?php echo $producto->getPrecio(); ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label text-light">Stock:</label>
                <input type="text" class="form-control" value="<?php echo $producto->getStock(); ?>" readonly>
            </div>
            <a class="btn btn-primary" href="list_productos.php" role="button">Volver</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
