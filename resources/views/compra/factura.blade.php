<x-app-layout>

@php
    $factura = session('factura');
@endphp

<link rel="stylesheet" href="{{ asset('css/factura.css') }}">

<div class="factura-container">

    <h1>Factura de Compra</h1>

    @include('compra.datos-cliente')
    @include('compra.tabla-productos')
    @include('compra.accion-boton')

</div>

@include('mensajes.correo')

</x-app-layout>

