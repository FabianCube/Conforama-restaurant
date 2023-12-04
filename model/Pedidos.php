<?php

class Pedidos
{
    private $pedido_id;
    private $usuario_id;
    private $estado;
    private $hora_pedido;

    public function __construct()
    { }

    /**
     * Get the value of pedido_id
     */ 
    public function getPedido_id()
    {
        return $this->pedido_id;
    }

    /**
     * Get the value of usuario_id
     */ 
    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of hora_pedido
     */ 
    public function getHora_pedido()
    {
        return $this->hora_pedido;
    }
}