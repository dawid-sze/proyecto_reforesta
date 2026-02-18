<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuariosPost;
use App\Models\Usuarios;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuarios::all();

        return view("usuarios.index", compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuariosPost $request)
    {   
        /* To-Do */
        //Salta error al poner nick duplicado. 
        
        $archivoPath = null;

        if($request->hasFile('avatar')){
            $archivoPath = $request->file('avatar')->store('repositorio_ficheros','public');

            $archivo = $request->file('archivo');

            dump($archivo->getRealPath());

            dump(Storage::path($archivoPath));
        }
        $usuario = Usuarios::create([
            'nick' => $request->nick,
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'avatar' => $archivoPath
        ]);
        $this->login($request);
        return redirect()->route('usuarios.show', $usuario->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuarios::findOrFail($id)->load(['hospeda', 'usuariosEventos']);

        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (auth()->check() && auth()->user()->id != $id) {
            return redirect()->route('inicio');
        }
        $usuario = Usuarios::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsuariosPost $request, string $id)
    {
        $usuario = Usuarios::findOrFail($id);

        $archivoPath = null;

        if($request->hasFile('avatar')){
            $archivoPath = $request->file('avatar')->store('repositorio_ficheros','public');

            $archivo = $request->file('archivo');

            dump($archivo->getRealPath());

            dump(Storage::path($archivoPath));
        }
        $usuario->edit([
            'nick' => $request->nick,
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'avatar' => $archivoPath
        ]);
        return redirect()->route('usuarios.show', $usuario - id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuarios::findOrFail($id);

        $usuario->delete();

        return redirect()->route('inicio');
    }

    public function loginForm()
    {
        return view('usuarios.login');
    }

    public function login(Request $request)
    {
        $credenciales = $request->only('email', 'password');
        if (Auth::attempt($credenciales)) {
            return redirect()->route('inicio');
        } else {
            $error = 'Usuario incorrecto';
            return view('usuarios.login', compact('error', 'credenciales'));
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('inicio');
    }

    public function signUp(string $id){
        auth()->user()->usuariosEventos()->syncWithoutDetaching([$id]);
    }

    public function signOff(string $id){
        auth()->user()->detach($id);
    }
}
