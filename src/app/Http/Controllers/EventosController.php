<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventosPost;
use App\Models\Eventos;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $eventos = Eventos::all();

        return view('inicio', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->check()) {
            return redirect()->route('inicio');
        }
       return view('eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventosPost $request)
    {
        $evento = Eventos::create([
            'nombre'=>$request->nombre,
            'tipo_evento'=>$request->tipo_evento,
            'tipo_terreno'=>$request->tipo_terreno,
            'ubicacion'=>$request->ubicacion,
            'fecha'=>$request->fecha,
            'descripcion'=>$request->descripcion,
            'imagen'=>$request->imagen,
            'id_anfitrion'=>auth()->user()->id
        ]);

        return redirect()->route('eventos.show', $evento->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $evento = Eventos::findOrFail($id);
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        return view('eventos.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $evento = Eventos::findOrFail($id);
        if (!auth()->check() && auth()->user()->id != $evento->id_anfitrion) {
            return redirect()->route('inicio');
        }

        return view('eventos.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventosPost $request, string $id)
    {
        $evento = Eventos::findOrFail($id);
        if (!auth()->check() && auth()->user()->id != $evento->id_anfitrion) {
            return redirect()->route('inicio');
        }
        $evento->edit([
            'nombre'=>$request->nombre,
            'tipo_evento'=>$request->tipo_evento,
            'tipo_terreno'=>$request->tipo_terreno,
            'ubicacion'=>$request->ubicacion,
            'fecha'=>$request->fecha,
            'descripcion'=>$request->descripcion,
            'imagen'=>$request->imagen
        ]);

        return redirect()->route('eventos.show', $evento->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $evento = Eventos::findOrFail($id);
        if (!auth()->check() && auth()->user()->id != $evento->id_anfitrion) {
            return redirect()->route('inicio');
        }
        $evento->delete();

        return redirect()->route('eventos.index');
    }

    
}
