<?php

class Carrito
{
    private $producto_carrito;
    private $cantidad=1;

    public function __construct($producto_carrito)
    {
        $this->producto_carrito = $producto_carrito;
    }



    /**
     * Get the value of producto_carrito
     */ 
    public function getProducto_carrito()
    {
        return $this->producto_carrito;
    }

    /**
     * Set the value of producto_carrito
     *
     * @return  self
     */ 
    public function setProducto_carrito($producto_carrito)
    {
        $this->producto_carrito = $producto_carrito;

        return $this;
    }

    /**
     * Get the value of cantidad
     */ 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */ 
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }
}