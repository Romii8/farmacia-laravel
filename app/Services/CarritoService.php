<?php

namespace App\Services;

class CarritoService
{
    public static function obtener()
    {
        return session()->get('carrito', []);
    }

    public static function agregar($id, $nombre, $precio)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            $carrito[$id] = [
                'id' => $id,
                'nombre' => $nombre,
                'precio' => $precio,
                'cantidad' => 1
            ];
        }

        session()->put('carrito', $carrito);

        return $carrito;
    }

    public static function eliminar($id)
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

        return $carrito;
    }

    public static function calcularTotal($carrito = null)
    {
        if ($carrito === null) {
            $carrito = self::obtener();
        }

        $total = 0;
        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        return $total;
    }

    public static function vaciar()
    {
        session()->forget('carrito');
    }
}
