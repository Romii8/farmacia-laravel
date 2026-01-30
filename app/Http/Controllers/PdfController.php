<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generar()
    {
        if (!session()->has('factura')) {
            return redirect('/');
        }

        $factura = session('factura');

        $pdf = Pdf::loadView('compra.factura-pdf', compact('factura'));

        $codigo = "FAC-" . date("Ymd") . "-" . rand(1000, 9999);

        return $pdf->download("Factura_$codigo.pdf");
    }
}
