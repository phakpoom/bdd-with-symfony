<?php

namespace AppBundle;

class Calculator
{
    public function add(float $x, float $y): float
    {
        return $x + $y;
    }

    public function subtract(float $x, float $y): float
    {
        return $x - $y;
    }

    public function multiply(float $x, float $y): float
    {
        return $x * $y;
    }

    public function divide(float $x, float $y): float
    {
        return $x / $y;
    }
}
