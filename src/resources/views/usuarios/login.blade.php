<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="/index.css">
</head>

<body>
    @include('navegacion')
    <div>
        <form action="/login" method="POST">
            @csrf
            @method('POST')
            <label for="email">Email:</label>
            <input type="text" name="email" value="{{ old('email') }}"><br>
            <label for="password">Contraseña:</label>
            <input type="text" name="password" value="{{ old('password') }}"><br>
            <input type="submit" value="Iniciar sesión">
        </form>
        <a href="{{ route('usuarios.create') }}"><button>Registrarse</button></a>
    </div>
</body>

</html>