<h2>Mis compras</h2>

@forelse($compras as $compra)
    <div style="border:1px solid #ccc; margin:10px; padding:10px;">
        <p><b>ID compra:</b> {{ $compra->id_compra }}</p>
        <p><b>Fecha:</b> {{ $compra->fecha }}</p>
        <p><b>Total:</b> ${{ $compra->total }}</p>
    </div>
@empty
    <p>No tienes compras aún.</p>
@endforelse
