
@php
    $carrito = session('carrito', []);
@endphp

<div class="bloque-carrito">
    <h2>🛒 Carrito</h2>

    @if (empty($carrito))
        <p>El carrito está vacío</p>
    @else
        <ul>
            @foreach ($carrito as $item)
                <li>
                    {{ $item['nombre'] }}
                    <strong>({{ $item['cantidad'] }})</strong>
                    - ${{ number_format($item['precio'], 2) }}

                    <a href="/carrito/eliminar/{{ $item['id'] }}">❌ Eliminar</a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
