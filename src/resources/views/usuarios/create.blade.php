<div>

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nick">Nick:</label>
        <input type="text" name="nick" id=""><br>
        @error('nick')
            <span>{{ $message }}</span>
        @enderror
        <br>
        
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id=""><br>
        @error('nombre')
            <span>{{ $message }}</span>
        @enderror
        <br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id=""><br>
        @error('apellidos')
            <span>{{ $message }}</span>
        @enderror
        <br>

        <label for="email">Email:</label>
        <input type="text" name="email" id=""><br>
        @error('email')
            <span>{{ $message }}</span>
        @enderror
        <br>

        <label for="password">Password:</label>
        <input type="text" name="password" id=""><br>
        @error('password')
            <span>{{ $message }}</span>
        @enderror
        <br>

        <label for="avatar">Avatar:</label>
        <input type="file" name="avatar" id=""><br>
        @error('avatar')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <input type="submit" value="Registrarse">
    </form>
</div>

