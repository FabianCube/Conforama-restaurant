<?php

class Producto
{
    private $PRODUCTO_ID;
    private $NOMBRE_PRODUCTO;
    private $DESCRIPCION;
    private $PRECIO_PRODUCTO;
    private $CATEGORIA_ID;

    public function __construct()
    { }

  
 

    /**
     * Get the value of PRODUCTO_ID
     */ 
    public function getPRODUCTO_ID()
    {
        return $this->PRODUCTO_ID;
    }

    /**
     * Set the value of PRODUCTO_ID
     *
     * @return  self
     */ 
    public function setPRODUCTO_ID($PRODUCTO_ID)
    {
        $this->PRODUCTO_ID = $PRODUCTO_ID;

        return $this;
    }

    /**
     * Get the value of NOMBRE_PRODUCTO
     */ 
    public function getNOMBRE_PRODUCTO()
    {
        return $this->NOMBRE_PRODUCTO;
    }

    /**
     * Set the value of NOMBRE_PRODUCTO
     *
     * @return  self
     */ 
    public function setNOMBRE_PRODUCTO($NOMBRE_PRODUCTO)
    {
        $this->NOMBRE_PRODUCTO = $NOMBRE_PRODUCTO;

        return $this;
    }

    /**
     * Get the value of DESCRIPCION
     */ 
    public function getDESCRIPCION()
    {
        return $this->DESCRIPCION;
    }

    /**
     * Set the value of DESCRIPCION
     *
     * @return  self
     */ 
    public function setDESCRIPCION($DESCRIPCION)
    {
        $this->DESCRIPCION = $DESCRIPCION;

        return $this;
    }

    /**
     * Get the value of PRECIO_PRODUCTO
     */ 
    public function getPRECIO_PRODUCTO()
    {
        return $this->PRECIO_PRODUCTO;
    }

    /**
     * Set the value of PRECIO_PRODUCTO
     *
     * @return  self
     */ 
    public function setPRECIO_PRODUCTO($PRECIO_PRODUCTO)
    {
        $this->PRECIO_PRODUCTO = $PRECIO_PRODUCTO;

        return $this;
    }

    /**
     * Get the value of CATEGORIA_ID
     */ 
    public function getCATEGORIA_ID()
    {
        return $this->CATEGORIA_ID;
    }

    /**
     * Set the value of CATEGORIA_ID
     *
     * @return  self
     */ 
    public function setCATEGORIA_ID($CATEGORIA_ID)
    {
        $this->CATEGORIA_ID = $CATEGORIA_ID;

        return $this;
    }
}