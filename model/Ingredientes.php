<?php
/**
 * Conforama-restaurant
 * @author Fabian Doizi
 */

/**
 * Clase Ingredientes
 * - Gestiona la informacón de los ingredientes.
 */
class Ingredientes
{
    private $ingrediente_id;
    private $nombre_ingrediente;
    private $precio_ingrediente;

    public function __construct()
    { }

    
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
     * Get the value of nombre_ingrediente
     */ 
    public function getNombre_ingrediente()
    {
        return $this->nombre_ingrediente;
    }

    /**
     * Set the value of nombre_ingrediente
     *
     * @return  self
     */ 
    public function setNombre_ingrediente($nombre_ingrediente)
    {
        $this->nombre_ingrediente = $nombre_ingrediente;

        return $this;
    }

    /**
     * Get the value of precio_ingrediente
     */ 
    public function getPrecio_ingrediente()
    {
        return $this->precio_ingrediente;
    }

    /**
     * Set the value of precio_ongrediente
     *
     * @return  self
     */ 
    public function setPrecio_ongrediente($precio_ingrediente)
    {
        $this->precio_ingrediente = $precio_ingrediente;

        return $this;
    }
}