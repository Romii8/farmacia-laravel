
@if (session()->has('correo_estado'))
<div class="mensaje-correo {{ session('correo_estado.ok') ? 'ok' : 'error' }}">
    {{ session('correo_estado.mensaje') }}
</div>
@endif
