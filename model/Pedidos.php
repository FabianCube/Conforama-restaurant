<?php
/**
 * Conforama-restaurant
 * @author Fabian Doizi
 */

class Pedidos
{
    private $pedido_id;
    private $usuario_id;
    private $estado;
    private $hora_pedido;
    private $precio_total;

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

    /**
     * Get the value of precio_total
     */ 
    public function getPrecio_total()
    {
        return $this->precio_total;
    }

    /**
     * Set the value of precio_total
     *
     * @return  self
     */ 
    public function setPrecio_total($precio_total)
    {
        $this->precio_total = $precio_total;

        return $this;
    }
}