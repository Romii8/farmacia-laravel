
@php
    $carrito = session('carrito', []);
@endphp

@if (!empty($carrito))
<div class="bloque-cliente">

    <h2>🧾 Datos del cliente 🧾</h2>

    <form action="/comprar" method="POST">
        @csrf
        <input type="text" name="direccion" placeholder="Dirección / Punto de entrega" required><br><br>

        <button type="submit">
            Confirmar compra
        </button>
    </form>

</div>
@endif
