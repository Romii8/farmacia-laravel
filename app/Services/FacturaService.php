<?php

namespace App\Services;

class FacturaService
{
    public static function generarCodigo()
    {
        return "FAC-" . date("Ymd") . "-" . rand(1000, 9999);
    }
}
