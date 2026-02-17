<div>
        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="avatar">Nuevo avatar:</label>
            <input type="file" name="avatar" id=""
                value="{{ old('avatar') !== null ? old('avatar') : $usuario->avatar }}"><br>
            @error('avatar')
                <span>{{ $message }}</span>
            @enderror
            <br>
            <input type="submit" value="Cambiar Avatar">
        </form>

</div>