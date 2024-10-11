<?php

class Producto
{
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $categoria;

    public function __construct($nombre, $descripcion, $precio, $stock, $categoria)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->categoria = $categoria;
    }

    // Getters

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    // Setters

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
}
