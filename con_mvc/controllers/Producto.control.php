<?php
$rutaCarpeta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$rutaProyecto = explode("/", $rutaCarpeta);

require_once $_SERVER['DOCUMENT_ROOT']. "/" . $rutaProyecto[1] .'/con_mvc/models/Producto.class.php';

class ProductoControl
{
    private $dbConnection;

    public function __construct()
    {
    $this->dbConnection = new PDO('mysql:host=localhost; dbname=gestiondeventas', 'root', '');
    }
    public function insertProducto($id_producto, $nombre, $precio, $stock,)
    {
        $producto_obj = new Producto($id_producto, $nombre, $precio, $stock);
        $producto = $producto_obj->insert_productos();
        return $producto;
    }

    public function editar_producto($id_producto, $nombre, $precio, $stock)
    {
        $producto_obj = new Producto($id_producto, $nombre, $precio, $stock);
        $producto = $producto_obj->editar_producto($id_producto);
        return $producto;
    }

     public function eliminar_producto($id_producto)
    {
       $producto_obj = new Producto($id_producto);
       $producto=$producto_obj->eliminar_producto();
       return $producto;
    }

    public function showProducto($id_producto)
    {

        $producto_obj = new Producto($id_producto);
        $producto = $producto_obj->getItem();
        return $producto;
    }

    

    public function list_producto()
    {
        $producto_obj = new Producto();
        $productos = $producto_obj->getAll();
        return $productos;
    }

    public function select_producto($id_producto)
    {
        
        // FETCH_OBJ
        $sql = $this->dbConnection->prepare("SELECT * FROM productos WHERE id_producto = ?");
        $sql->bindParam(1, $id_producto);
        // Ejecutamos
        $sql->execute();
        // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
        if($row = $sql->fetch(PDO::FETCH_OBJ)) {
            // Creacion de objeto de la clase paciente
            $pro_obj = new Producto($row->id_producto, $row->nombre, $row->precio, $row->stock);
        }else{
            $pro_obj = null;
        }
        return $pro_obj; // Se retorna el objeto de pacientes
    }
}
