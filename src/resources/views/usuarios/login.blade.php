<div>
    <form action="usuarios.login" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="text" name="email"><br>
        <label for="password">Contraseña:</label>
        <input type="text" name="password"><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</div>