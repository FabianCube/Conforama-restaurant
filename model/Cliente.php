<?php

class Cliente extends Usuarios
{
    protected $nivel_cliente;

    public function __construct()
    { 
        parent::__construct();
    }

    /**
     * Get the value of nivel_cliente
     */ 
    public function getNivel_cliente()
    {
        return $this->nivel_cliente;
    }

    /**
     * Set the value of nivel_cliente
     *
     * @return  self
     */ 
    public function setNivel_cliente($nivel_cliente)
    {
        $this->nivel_cliente = $nivel_cliente;

        return $this;
    }
}