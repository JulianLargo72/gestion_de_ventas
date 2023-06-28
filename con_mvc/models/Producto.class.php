<?php
$rutaCarpeta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$rutaProyecto = explode("/", $rutaCarpeta);

require_once $_SERVER['DOCUMENT_ROOT']. "/" . $rutaProyecto[1] .'/con_mvc/core/Connection.php';

class Producto extends Connection
{
    private $id_producto;
    private $nombre;
    private $precio;
    private $stock;


    public function __construct($id_producto = null, $nombre = null, $precio = null, $stock = null)
    {
        $this->id_producto = $id_producto;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
        parent::__construct();
    }

    public function getAll()
    {
        try {
            // FETCH_OBJ
            $sql = $this->dbConnection->prepare("SELECT * FROM productos");

            // Ejecutamos
            $sql->execute();
            $resultSet = null;
            // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
            while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $resultSet[] = $row;
            }
            return $resultSet;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function insert_productos()
    {
        try {
            $sql = $this->dbConnection->prepare("INSERT INTO productos (id_producto, nombre, precio, stock)values(?,?,?,?)");
            $sql->bindParam(1, $this->id_producto);
            $sql->bindParam(2, $this->nombre);
            $sql->bindParam(3, $this->precio);
            $sql->bindParam(4, $this->stock);
            // Ejecutamos
            $sql->execute();
            return true;
        } catch (PDOException $ex) {
            echo '<div class="alert alert-danger container text-center" role="alert">
        <strong>ERROR EN SISTEMA CONSULTE A SU TI MAS CERCANO</strong>
    </div>';
            die();

        }

    }

    public function editar_producto($id_producto)
    {
        try
        {
            $dbproducto = $this->dbConnection->prepare("UPDATE productos SET nombre=:nombre,precio=:precio,stock=:stock WHERE id_producto=:id_producto");
            $dbproducto->bindParam(":id_producto", $id_producto);
            $dbproducto->bindParam(":nombre", $this->nombre);
            $dbproducto->bindParam(":precio", $this->precio);
            $dbproducto->bindParam(":stock", $this->stock);

            $dbproducto->execute();
            return $dbproducto;
        } catch (PDOException $ex) {
            echo '<div class="alert alert-danger container text-center" role="alert">
        <strong>ERROR EN SISTEMA CONSULTE A SU TI MAS CERCANO</strong>
    </div>';

            die();
        }

    }

    public function eliminar_producto()
    {
        try
        {
            $dbproducto = $this->dbConnection->prepare("DELETE FROM productos where id_producto=:id_producto");
            $dbproducto->bindParam(":id_producto", $this->id_producto);
            $dbproducto->execute();
            return $dbproducto;
        } catch (PDOException $ex) {
            echo '<div class="alert alert-danger container text-center" role="alert">
        <strong>ERROR EN SISTEMA CONSULTE A SU TI MAS CERCANO</strong>
    </div>';

            die();
        }

    }

    public function getItem()
    {
        try {

            $sql = $this->dbConnection->prepare("SELECT * FROM productos WHERE id_producto =?");
            $sql->bindParam(1, $this->id_producto);
            $sql->execute();
            $resultSet = null;
            while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $resultSet = $row;
            }
            return $resultSet;
        } catch (PDOException $ex) {
            echo '<div class="alert alert-danger container text-center" role="alert">
        <strong>ERROR EN SISTEMA CONSULTE A SU TI MAS CERCANO</strong>
    </div>';

            die();
        }
    }

    public function getIdProducto()
    {
        return $this->id_producto;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */


    public function setIdProducto($id_producto)
    {
        $this->id_producto = $id_producto;
        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    
    /**
     * Set the value of nombre
     *
     * @return  self
     */


    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */


    public function setPrecio($precio)
    {
        $this->precio = $precio;
        return $this;
    }

    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of documento
     *
     * @return  self
     */


    public function setStock($stock)
    {
        $this->stock = $stock;
        return $this;
    }
}   
?>