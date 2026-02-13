<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
    public function store(Request $request)
    {
        $usuario = Usuarios::create([
            'nick'=>$request->nick,
            'nombre'=>$request->nombre,
            'apellidos'=>$request->apellidos,
            'password'=>$request->password,
            'email'=>$request->email,
            'avatar'=>$request->avatar
        ]);

        return redirect()->route('usuarios.show',$usuario->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuarios::findOrFail($id)->load(['hospeda', 'usuarios_eventos']);

        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = Usuarios::findOrFail($id);

        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = Usuarios::findOrFail($id);

        $usuario->edit([
            'nick'=>$request->nick,
            'nombre'=>$request->nombre,
            'apellidos'=>$request->apellidos,
            'password'=>$request->password,
            'email'=>$request->email,
            'avatar'=>$request->avatar
        ]);
        return redirect()->route('usuarios.show', $usuario-id);
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

    public function loginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $credenciales = $request->only('email','password');

        if(Auth::attempt($credenciales)){
            return redirect()->intended(route('inicio'));
        }else{
            $error = 'Usuario incorrecto';
            return view('auth.login', compact('error'));
        }
    }
}
