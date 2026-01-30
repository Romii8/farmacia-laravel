<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>pharmaucsg</title>
    <link rel="stylesheet" href="{{ asset('css/farmacia.css') }}">
</head>
<body>
    <div class="container">
        <div class="overlay">
            <header class="header">
                <h1>PHARMAUCSG</h1>
                <p>Tu salud, nuestra prioridad 💊</p>
            </header>

            <div class="buttons">
                <a href="{{ route('login') }}" class="btn btn-login">Iniciar sesión</a>
                <a href="{{ route('register') }}" class="btn btn-register">Registrarse</a>
            </div>
        </div>
    </div>
</body>
</html>
