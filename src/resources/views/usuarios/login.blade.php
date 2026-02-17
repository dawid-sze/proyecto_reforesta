<div>
    <form action="/login" method="POST">
        @csrf
        @method('POST')
        <label for="email">Email:</label>
        <input type="text" name="email" value="{{ old('email') }}"><br>
        <label for="password">Contraseña:</label>
        <input type="text" name="password" value="{{ old('password') }}"><br>
        <input type="submit" value="Iniciar sesión">
        <a href="{{ route('usuarios.create') }}"><button>Registrarse</button></a>
    </form>
</div>