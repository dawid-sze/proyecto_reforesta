<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

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
        $usuario = Usuarios::findOrFail($id);

        return view('usuarios.show', 'usuario');
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
}
