<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CarritoService;

class CarritoController extends Controller
{
    public function agregar(Request $request)
    {
        CarritoService::agregar(
            $request->id_producto,
            $request->nombre_producto,
            $request->precio
        );

        return redirect()->route('dashboard');
    }

    public function eliminar($id)
    {
        CarritoService::eliminar($id);

        return redirect('/dashboard');
    }
}
