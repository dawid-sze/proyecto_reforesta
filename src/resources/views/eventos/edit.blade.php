<div>
    <form action="" method="POST">
        @csrf
        @method("PUT")
        <label for="fecha">Fecha del evento: </label>
        <input type="date" name="fecha" id="" value="{{ old('fecha') !== null ? old('fecha')  : $evento->imagen }}"><br>
        @error('fecha')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label for="descripcion">Descripción del evento: </label>
        <input type="text" name="descripcion" id="" value="{{ old('descripcion') !== null ? old('descripcion')  : $evento->imagen }}"><br>
        @error('descripcion')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label for="imagen">Imagen del evento:</label>
        <input type="file" name="imagen" id="" value="{{ old('imagen') !== null ? old('imagen')  : $evento->imagen }}"><br>
        @error('imagen')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <input type="submit" value="Modificar evento">
    </form>
</div>
