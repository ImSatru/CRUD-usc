<?php

class Producto {
    public $nombre;
    public $descripcion;
    public $precio;
    public $stock;
    public $categoria; // Será una instancia de la clase Categoria

    public function __construct($nombre, $descripcion, $precio, $stock, Categoria $categoria) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->categoria = $categoria;
    }
}
?>
