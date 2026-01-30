
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="{{ public_path('css/pdfFactura.css') }}">
</head>
<body>

<h2>Factura de Compra</h2>

<p><strong>Nombre:</strong> {{ $factura['cliente']['nombre'] }}</p>
<p><strong>Correo:</strong> {{ $factura['cliente']['correo'] }}</p>
<p><strong>Dirección:</strong> {{ $factura['cliente']['direccion'] }}</p>
<p><strong>Fecha:</strong> {{ $factura['fecha'] }}</p>

<table>
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
    <td>${{ number_format($item['precio'],2) }}</td>
    <td>${{ number_format($item['precio']*$item['cantidad'],2) }}</td>
</tr>
@endforeach
</tbody>
</table>

<h3>Total: ${{ number_format($factura['total'],2) }}</h3>

</body>
</html>
