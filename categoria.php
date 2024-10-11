<?php

class Categoria {
    private $id_categoria;
    private $nombre_Categoria;
    private $id_producto;

    public function __construct($id_categoria = null, $nombre_Categoria = null, $id_producto) {
        $this->id_categoria = $id_categoria;
        $this->nombre_Categoria = $nombre_Categoria;
        $this->id_producto = $id_producto;
    }

    public function getIdCategoria() {
        return $this->id_categoria;
    }

    public function getNombreCategoria() {
        return $this->nombre_Categoria;
    }

    public function getIdProducto() {
        return $this->id_producto;
    }

    public function setIdCategoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    public function setNombreCategoria($nombre_Categoria) {
        $this->nombre_Categoria = $nombre_Categoria;
    }

    public function setIdProducto($id_producto) {
        $this->id_producto = $id_producto;
    }
}
?>