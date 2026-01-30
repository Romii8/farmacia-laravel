<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmacionCompra extends Mailable
{
    use Queueable, SerializesModels;

    public $factura;

    public function __construct($factura)
    {
        $this->factura = $factura;
    }

    public function build()
    {
        return $this->subject('Confirmación de compra')
                    ->view('mensajes.confirmacion-compra');
    }
}

