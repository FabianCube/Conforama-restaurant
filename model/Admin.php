<?php

class Admin extends Usuarios
{
    protected $nivel_acceso;

    public function __construct()
    { 
        parent::__construct();
    }

    /**
     * Get the value of nivel
     */ 
    public function nivel_acceso()
    {
        return $this->nivel_acceso;
    }

    /**
     * Set the value of nivel
     *
     * @return  self
     */ 
    public function setNivel($nivel_acceso)
    {
        $this->nivel_acceso = $nivel_acceso;

        return $this;
    }
}