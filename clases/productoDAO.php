<?php

class ProductoDAO {
    private $conn;

    public function __construct($db) {
        try {
            $this->conn = $db;
        } catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage();
        }
    }

    // Crear producto
    public function crearProducto(Producto $producto) {
        try {
            $sql = "INSERT INTO productos (nombre_producto, descripcion, precio, stock, id_categoria) 
                    VALUES (:nombre, :descripcion, :precio, :stock, :id_categoria)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nombre', $producto->nombre);
            $stmt->bindParam(':descripcion', $producto->descripcion);
            $stmt->bindParam(':precio', $producto->precio);
            $stmt->bindParam(':stock', $producto->stock);
            $stmt->bindParam(':id_categoria', $producto->categoria->id_categoria);
            $stmt->execute();
        } catch (PDOException $e) {
            // Manejar la excepción
            echo "Error al crear el producto: " . $e->getMessage();
            return false;
        }
        return true;
    }

    // Leer producto por ID
    public function obtenerProductoPorId($id_producto) {
        if (!is_numeric($id_producto)) {
            throw new InvalidArgumentException("El ID del producto debe ser un número.");
        }

        try {
            $sql = "SELECT * FROM productos WHERE id = :id_producto";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_producto', $id_producto);
            $stmt->execute();
            $producto = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$producto) {
                throw new Exception("Producto no encontrado.");
            }

            return $producto;
        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Actualizar producto
    public function actualizarProducto(Producto $producto, $id_producto) {
        if (!is_numeric($id_producto)) {
            throw new InvalidArgumentException("El ID del producto debe ser un número.");
        }

        try {
            $sql = "UPDATE productos SET nombre_producto = :nombre, descripcion = :descripcion, 
                    precio = :precio, stock = :stock, id_categoria = :id_categoria 
                    WHERE id = :id_producto";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nombre', $producto->nombre);
            $stmt->bindParam(':descripcion', $producto->descripcion);
            $stmt->bindParam(':precio', $producto->precio);
            $stmt->bindParam(':stock', $producto->stock);
            $stmt->bindParam(':id_categoria', $producto->categoria->id_categoria);
            $stmt->bindParam(':id_producto', $id_producto);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar el producto: " . $e->getMessage();
            return false;
        }
        return true;
    }

    // Eliminar producto
    public function eliminarProducto($id_producto) {
        if (!is_numeric($id_producto)) {
            throw new InvalidArgumentException("El ID del producto debe ser un número.");
        }

        try {
            $sql = "DELETE FROM productos WHERE id = :id_producto";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_producto', $id_producto);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar el producto: " . $e->getMessage();
            return false;
        }
        return true;
    }

    
}

?>

