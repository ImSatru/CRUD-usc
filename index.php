<?php
require_once 'conexion\Conexion.php';
require_once 'clases\Producto.php';
require_once 'clases\Categoria.php';
require_once 'clases\ProductoDAO.php';

// Conexión a la base de datos
$conexion = new Conexion();
$db = $conexion->conectar();

// Crear una nueva categoría
$categoria = new Categoria(1, "Carnes");

// Crear un nuevo producto
$producto = new Producto("Pollo", "Es pollo, de origen de pollo ¿Que mas esperas?", 10000, 10, $categoria);

// Instanciar el DAO y realizar las operaciones
$productoDAO = new ProductoDAO($db);

// Crear producto
$productoDAO->crearProducto($producto);

// Leer producto por ID
$productoObtenido = $productoDAO->obtenerProductoPorId(1);
print_r($productoObtenido);

// Actualizar producto
$producto->precio = 1100; // Cambiar el precio
$productoDAO->actualizarProducto($producto, 1);

// Eliminar producto
$productoDAO->eliminarProducto(7);
?>
