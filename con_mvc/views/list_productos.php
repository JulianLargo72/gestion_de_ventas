<?php
    include_once '../controllers/Producto.control.php';
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
    <form action="" method="get">
    <?php
        // Se crea una instancia de la clase ProductoControl
        $producto_obj = new ProductoControl();
        // Se llama al método que lista a todos los pacientes
        $productos = $producto_obj->list_producto();
    ?>
    <div class="container-fluid backg1">
        HEADER MENU
    </div>
    <div class="container">
        <h1 class="text-light">Gestionar Productos</h1>
        <div class="row">
            <div class="col">
                <a class="btn btn-success btn-lg" href="agg_producto.php" role="button">Insertar</a>
            </div>
        </div>
        <br>
        <div class="row text-light mb-2">
            <div class="col-1">ID</div>
            <div class="col-1">Nombre</div>
            <div class="col-1">Precio</div>
            <div class="col-1">Stock</div>
            <div class="col-1">Opciones</div>
        </div>
        <?php foreach ($productos as $item) {?>
        <div class="row text-light mb-2">
            <div class="col-1"><?php echo $item->id_producto; ?></div>
            <div class="col-1"><?php echo $item->nombre; ?></div>
            <div class="col-1"><?php echo $item->precio; ?></div>
            <div class="col-1"><?php echo $item->stock; ?></div>
            <div class="col-1">
                <a class="btn btn-warning btn-lg text-light" href="ver_productos.php?id_producto=<?php echo $item->id_producto; ?>" role="button">Ver</a>

            </div>
            <div class="col-1">
                <a class="btn btn-primary btn-lg"
                href="edit_producto.php?id_producto=<?php echo $item->id_producto; ?>" role="button">Editar</a>
            </div>
            <div class="col-1">
                <a class="btn btn-danger btn-lg" href="eliminar_producto.php?id_producto=<?php echo $item->id_producto; ?>" role="button">Eliminar</a>
            </div>
        </div><br>
        <?php }?>
    </div>
    <br>
    <div class="container-fluid backg1">FOOTER</div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>
