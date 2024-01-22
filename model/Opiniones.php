<?php

class Opiniones
{
    private $opinion_id;
    private $usuario_id;
    private $titulo;
    private $opinion;
    private $puntuacion;
    private $fecha_opinion;

    public function __construct()
    { }

    /**
     * Get the value of opinion_id
     */ 
    public function getOpinion_id()
    {
        return $this->opinion_id;
    }

    /**
     * Set the value of opinion_id
     *
     * @return  self
     */ 
    public function setOpinion_id($opinion_id)
    {
        $this->opinion_id = $opinion_id;

        return $this;
    }

    /**
     * Get the value of usuario_id
     */ 
    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    /**
     * Set the value of usuario_id
     *
     * @return  self
     */ 
    public function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    /**
     * Get the value of opinion
     */ 
    public function getOpinion()
    {
        return $this->opinion;
    }

    /**
     * Set the value of opinion
     *
     * @return  self
     */ 
    public function setOpinion($opinion)
    {
        $this->opinion = $opinion;

        return $this;
    }

    /**
     * Get the value of puntuacion
     */ 
    public function getPuntuacion()
    {
        return $this->puntuacion;
    }

    /**
     * Set the value of puntuacion
     *
     * @return  self
     */ 
    public function setPuntuacion($puntuacion)
    {
        $this->puntuacion = $puntuacion;

        return $this;
    }

    /**
     * Get the value of fecha_opinion
     */ 
    public function getFecha_opinion()
    {
        return $this->fecha_opinion;
    }

    /**
     * Set the value of fecha_opinion
     *
     * @return  self
     */ 
    public function setFecha_opinion($fecha_opinion)
    {
        $this->fecha_opinion = $fecha_opinion;

        return $this;
    }

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }
}