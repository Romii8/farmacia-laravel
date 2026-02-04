<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Services\FacturaService;

class PdfController extends Controller
{
    public function generar()
    {
        if (!session()->has('factura')) {
            return redirect('/');
        }

        $factura = session('factura');

        $pdf = Pdf::loadView('compra.factura-pdf', compact('factura'));

        $codigo = FacturaService::generarCodigo();

        return $pdf->download("Factura_$codigo.pdf");
    }
}

