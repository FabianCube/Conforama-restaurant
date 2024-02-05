<?php

include_once 'config/parameters.php';

class conversor_puntos
{
    public function exchangeMoneyToPoints($spent)
    {
        // Cada € tiene un valor de 100 puntos.
        return $spent * COIN_VALUE;
    }

    public function exchangePointsToDiscount($points)
    {
        // Cada punto tiene un valor de 0.1 €
        return $points * EXCHANGE_VALUE / 100;
    }
}