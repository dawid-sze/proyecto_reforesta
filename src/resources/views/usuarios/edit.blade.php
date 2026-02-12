<div>
    <form action="contactos.update" method="POST">
        @csrf
        @method('PUT')
        
        <label for="avatar">Nuevo avatar:</label>
        <input type="file" name="avatar" id=""><br>
        @error('avatar')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <input type="submit" value="Cambiar Avatar">
    </form>
</div>