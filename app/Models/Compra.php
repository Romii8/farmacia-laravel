<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Compra
{
public static function guardarCliente($nombre, $correo, $direccion)
{
    
    $cliente = DB::table('clientes')->where('user_id', Auth::id())->first();

    if ($cliente) {
        return $cliente->id_cliente;
    }

    return DB::table('clientes')->insertGetId([
        'nombre' => $nombre,
        'correo' => $correo,
        'direccion' => $direccion,
        'user_id' => Auth::id()
    ]);
}

public static function guardarCompra($id_cliente, $total)
    {
        DB::table('compras')->insert([
            'id_cliente' => $id_cliente,
            'fecha' => now(),
            'total' => $total
        ]);

        return DB::getPdo()->lastInsertId();
    }

public static function guardarDetalle($id_compra, $id_producto, $cantidad, $precio)
    {
        DB::table('detalle_compra')->insert([
            'id_compra' => $id_compra,
            'id_producto' => $id_producto,
            'cantidad' => $cantidad,
            'precio_unitario' => $precio
        ]);
    }
}
