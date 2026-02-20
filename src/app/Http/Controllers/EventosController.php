<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventosPost;
use App\Models\Especies;
use App\Models\Eventos;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check()) {
            $eventos = Eventos::all()->load(['anfitrion', 'participantes']);
        } else {
            $eventos = Eventos::all()->load('anfitrion');
        }

        return view('inicio', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->check()) {
            return view('usuarios.login');
        }
        $especies = Especies::all();
        return view('eventos.create', compact('especies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventosPost $request)
    {
        $archivoPathImagen = null;
        $archivoPathPDF = null;


        $archivoPathImagen = $request->file('imagen')->store('repositorio_ficheros');
        $archivoPathImagen = Storage::url($archivoPathImagen);


        $archivoPathPDF = $request->file('pdf')->store('repositorio_ficheros');
        $archivoPathPDF = Storage::url($archivoPathPDF);



        $evento = Eventos::create([
            'nombre' => $request->nombre,
            'tipo_evento' => $request->tipo_evento,
            'tipo_terreno' => $request->tipo_terreno,
            'ubicacion' => $request->ubicacion,
            'fecha' => $request->fecha,
            'descripcion' => $request->descripcion,
            'imagen' => $archivoPathImagen,
            'pdf' => $archivoPathPDF,
            'anfitrion_id' => auth()->user()->id
        ]);
        $evento->especies()->syncWithoutDetaching([$request->especie]);
        return redirect()->route('eventos.show', $evento->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $evento = Eventos::findOrFail($id)->load('anfitrion', 'anfitrion');
        if (!auth()->check()) {
            return view('usuarios.login');
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
    public function update(Request $request, string $id)
    {
        $evento = Eventos::findOrFail($id);
        if (!auth()->check() && auth()->user()->id != $evento->id_anfitrion) {
            return redirect()->route('inicio');
        }
        $archivoPathImagen = null;
        $archivoPathPDF = null;

        if ($request->hasFile(key: 'imagen') && $request->imagen != null) {
            $archivoPathImagen = $request->file('imagen')->store('repositorio_ficheros');
            $archivoPathImagen = Storage::url($archivoPathImagen);
        }
        if ($request->hasFile(key: 'pdf') && $request->pdf != null) {
            $archivoPathPDF = $request->file('pdf')->store('repositorio_ficheros');
            $archivoPathPDF = Storage::url($archivoPathPDF);
        }
        $evento->update([
            'nombre' => $request->nombre != "" ? $request->nombre : $evento->nombre,
            'tipo_evento' => $request->tipo_evento != "" ? $request->tipo_evento : $evento->tipo_evento,
            'tipo_terreno' => $request->tipo_terreno != "" ? $request->tipo_terreno : $evento->tipo_terreno,
            'ubicacion' => $request->ubicacion != "" ? $request->ubicacion : $evento->ubicacion,
            'fecha' => $request->fecha > new DateTime('today') ? $request->fecha : $evento->fecha,
            'descripcion' => $request->descripcion != "" ? $request->descripcion : $evento->descripcion,
            'imagen' => $archivoPathImagen ?: $evento->imagen,
            'pdf' => $archivoPathPDF ?: $evento->pdf,
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
