<div>

    <form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <label for="nick">Nick:</label>
        <input type="text" name="nick" id="" value="{{ old('nick') }}"><br>
        @error('nick')
            <span>{{ $message }}</span>
        @enderror
        <br>
        
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="" value="{{ old('nombre') }}"><br>
        @error('nombre')
            <span>{{ $message }}</span>
        @enderror
        <br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="" value="{{ old('apellidos') }}"><br>
        @error('apellidos')
            <span>{{ $message }}</span>
        @enderror
        <br>

        <label for="email">Email:</label>
        <input type="text" name="email" id="" value="{{ old('email') }}"><br>
        @error('email')
            <span>{{ $message }}</span>
        @enderror
        <br>

        <label for="password">Password:</label>
        <input type="text" name="password" id="" value="{{ old('password') }}"><br>
        @error('password')
            <span>{{ $message }}</span>
        @enderror
        <br>

        <label for="avatar">Avatar:</label>
        <input type="file" name="avatar" id="" value="{{ old('avatar') }}"><br>
        @error('avatar')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <input type="submit" value="Registrarse">
    </form>
</div>

