<?php
include_once '../../con_mvc/controllers/Producto.control.php';
if (isset($_GET['id_producto'])) {
    $id_producto = $_GET['id_producto'];
    $producto_obj = new ProductoControl();
    // Obtener los datos del artículo para su edición
    $producto = $producto_obj->eliminar_producto($id_producto); 

    header('Location: list_productos.php');

    
} else {
    // Manejar el caso en que no se ha proporcionado un ID de artículo válido
    echo "ID de artículo no especificado";
    
    exit;

    
}
?>