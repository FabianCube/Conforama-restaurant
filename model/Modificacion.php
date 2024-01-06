<?php

/**
 * Conforama-restaurant
 * @author Fabian Doizi
 */

class Modificacion
{
    private $modificacion_id;
    private $ingrediente_id;
    private $accion;
    private $cantidad_ingrediente;
    private $precio_suplemento;

    public function __construct()
    { }

    
    /**
     * Get the value of modificacion_id
     */ 
    public function getModificacion_id()
    {
        return $this->modificacion_id;
    }

    /**
     * Set the value of modificacion_id
     *
     * @return  self
     */ 
    public function setModificacion_id($modificacion_id)
    {
        $this->modificacion_id = $modificacion_id;

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
     * Get the value of accion
     */ 
    public function getAccion()
    {
        return $this->accion;
    }

    /**
     * Set the value of accion
     *
     * @return  self
     */ 
    public function setAccion($accion)
    {
        $this->accion = $accion;

        return $this;
    }

    /**
     * Get the value of cantidad_ingrediente
     */ 
    public function getCantidad_ingrediente()
    {
        return $this->cantidad_ingrediente;
    }

    /**
     * Set the value of cantidad_ingrediente
     *
     * @return  self
     */ 
    public function setCantidad_ingrediente($cantidad_ingrediente)
    {
        $this->cantidad_ingrediente = $cantidad_ingrediente;

        return $this;
    }

    /**
     * Get the value of precio_suplemento
     */ 
    public function getPrecio_suplemento()
    {
        return $this->precio_suplemento;
    }

    /**
     * Set the value of precio_suplemento
     *
     * @return  self
     */ 
    public function setPrecio_suplemento($precio_suplemento)
    {
        $this->precio_suplemento = $precio_suplemento;

        return $this;
    }
}