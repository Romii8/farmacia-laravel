<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('categoria')) {
            $productos = Producto::obtenerProductosPorCategoria($request->categoria);
        } else {
            $productos = Producto::obtenerProductos();
        }

        return view('productos.lista', compact('productos'));
    }
}
