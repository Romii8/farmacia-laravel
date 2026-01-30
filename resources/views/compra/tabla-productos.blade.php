
<table class="tabla-productos">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($factura['carrito'] as $item)
            <tr>
                <td>{{ $item['nombre'] }}</td>
                <td>{{ $item['cantidad'] }}</td>
                <td>${{ number_format($item['precio'], 2) }}</td>
                <td>${{ number_format($item['precio'] * $item['cantidad'], 2) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<h2 class="total">Total: ${{ number_format($factura['total'], 2) }}</h2>
