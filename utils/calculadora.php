<?php
/**
 * Conforama-restaurant
 * @author Fabian Doizi
 */

class calculadora
{
    public static function calcularPrecioTotal($productos)
    {
        $total = 0;

        foreach ($productos as $producto) 
        {
            $total += $producto->getProducto_carrito()->getPrecio_producto() * $producto->getCantidad();
        }

        return $total;
    }
}