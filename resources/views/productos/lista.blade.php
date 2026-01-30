<x-app-layout>

<div class="layout-productos">

    <aside class="sidebar-categorias">
        <h3>Categorías</h3>
        <a href="/dashboard">Todos</a>
        <a href="{{ url('/dashboard?categoria=1') }}">Belleza y cuidado de la piel</a>
        <a href="{{ url('/dashboard?categoria=2') }}">Cuidado infantil</a>
        <a href="{{ url('/dashboard?categoria=3') }}">Cuidado personal</a>
        <a href="{{ url('/dashboard?categoria=4') }}">Salud digestiva</a>
        <a href="{{ url('/dashboard?categoria=5') }}">Antigripales</a>
        <a href="{{ url('/dashboard?categoria=6') }}">Salud y primeros auxilios</a>
    </aside>

    <div class="contenedor-productos">
        @foreach ($productos as $producto)
            <div class="producto">
                <img 
                    src="{{ asset('img/productos/' . $producto->imagen) }}"
                    alt="{{ $producto->nombre }}"
                    class="img-producto"
                >           

                <h3>{{ $producto->nombre }}</h3>
                <p>{{ $producto->descripcion }}</p>
                <p><strong>${{ $producto->precio }}</strong></p>

                <form action="{{ url('/carrito/agregar') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_producto" value="{{ $producto->id_producto }}">
                    <input type="hidden" name="nombre_producto" value="{{ $producto->nombre }}">
                    <input type="hidden" name="precio" value="{{ $producto->precio }}">
                    <button type="submit">🛒 Agregar</button>
                </form>
            </div>
        @endforeach
    </div>

    <div class="sidebar-carrito">
        @include('productos.carrito')
        @include('productos.cliente')
    </div>

</div>

</x-app-layout>
