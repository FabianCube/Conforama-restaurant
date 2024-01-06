<?php

/**
 * Conforama-restaurant
 * @author Fabian Doizi
 */

class Productos_Ingredientes
{
    private $productos_ingredientes_id;
    private $producto_id;
    private $ingrediente_id;
    private $cantidad;

    public function __construct()
    { }


    /**
     * Get the value of productos_ingredientes_id
     */ 
    public function getProductos_ingredientes_id()
    {
        return $this->productos_ingredientes_id;
    }

    /**
     * Set the value of productos_ingredientes_id
     *
     * @return  self
     */ 
    public function setProductos_ingredientes_id($productos_ingredientes_id)
    {
        $this->productos_ingredientes_id = $productos_ingredientes_id;

        return $this;
    }

    /**
     * Get the value of producto_id
     */ 
    public function getProducto_id()
    {
        return $this->producto_id;
    }

    /**
     * Set the value of producto_id
     *
     * @return  self
     */ 
    public function setProducto_id($producto_id)
    {
        $this->producto_id = $producto_id;

        return $this;
    }

    /**
     * Get the value of ingrediente_id
     */ 
    public function getIngrediente_id()
    {
        return $this->ingrediente_id;
    }

    /**
     * Set the value of ingrediente_id
     *
     * @return  self
     */ 
    public function setIngrediente_id($ingrediente_id)
    {
        $this->ingrediente_id = $ingrediente_id;

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