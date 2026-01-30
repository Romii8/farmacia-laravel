<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function agregar(Request $request)
    {
        $carrito = session()->get('carrito', []);

        $id = $request->id_producto;

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            $carrito[$id] = [
                'id' => $id,
                'nombre' => $request->nombre_producto,
                'precio' => $request->precio,
                'cantidad' => 1
            ];
        }

        session()->put('carrito', $carrito);

        return redirect()->route('dashboard');
    }

    public function eliminar($id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            if ($carrito[$id]['cantidad'] > 1) {
                $carrito[$id]['cantidad']--;
            } else {
                unset($carrito[$id]);
            }
        }

        session()->put('carrito', $carrito);

        return redirect('/dashboard');
    }
}
