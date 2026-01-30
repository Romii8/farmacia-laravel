<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Producto
{
    public static function obtenerProductos()
    {
        return DB::table('productos')
            ->leftJoin('categorias', 'productos.id_categoria', '=', 'categorias.id_categoria')
            ->select('productos.*', 'categorias.nombre as categoria')
            ->get();
    }

    public static function obtenerProductosPorCategoria($idCategoria)
    {
        return DB::table('productos')
            ->where('id_categoria', $idCategoria)
            ->get();
    }
}
