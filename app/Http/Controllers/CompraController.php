<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmacionCompra;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\CarritoService;

class CompraController extends Controller
{
    public function confirmar(Request $request)
    {
        $carrito = CarritoService::obtener();

        if (empty($carrito)) {
            return redirect('/');
        }

        $total = CarritoService::calcularTotal($carrito);

        $user = Auth::user();

        $id_cliente = Compra::guardarCliente(
        $user->name,
        $user->email,
        $request->direccion
        );

        $id_compra = Compra::guardarCompra($id_cliente, $total);

        foreach ($carrito as $item) {
            Compra::guardarDetalle(
                $id_compra,
                $item['id'],
                $item['cantidad'],
                $item['precio']
            );
        }

        $factura = [
        'cliente' => [
        'nombre' => $user->name,
        'correo' => $user->email,
        'direccion' => $request->direccion,
        ],
        'carrito' => $carrito,
        'total' => $total,
        'fecha' => now()->format('Y-m-d H:i:s')
        ];

        session()->put('factura', $factura);
        CarritoService::vaciar();

        try {
            Mail::to($user->email)->send(new ConfirmacionCompra($factura));

            session()->flash('correo_estado', [
                'ok' => true,
                'mensaje' => 'Compra confirmada y correo enviado correctamente ✅'
            ]);
        } catch (\Exception $e) {
            session()->flash('correo_estado', [
            'ok' => false,
            'mensaje' => 'Compra realizada, pero el correo no pudo enviarse ❌'
        ]);
        }

        return redirect('/factura');
        }

    public function misCompras()
    {
    $compras = DB::table('compras')
        ->join('clientes', 'compras.id_cliente', '=', 'clientes.id_cliente')
        ->where('clientes.user_id', Auth::id())
        ->select('compras.*')
        ->get();

    return view('compra.mis-compras', compact('compras'));
    }
}
