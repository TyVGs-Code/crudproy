<?php

namespace App\Http\Controllers;

use App\Models\Anexos;
use App\Models\Evaact;
use Illuminate\Http\Request;

class AnexosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anexo = Anexos::with(['evaluacion'])->get(); 
        return view('anexos.index', compact('anexo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $evaluaciones = Evaact::all();
        return view('anexos.create', compact('evaluaciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Permisos' => 'required|string|max:60',
            'ApaMed' => 'required|string|max:255',
            'Herramienta' => 'required|string|max:255',
            'Duracion' => 'required|string|max:60',
            'Archivo' => 'required|string|max:60',
            'Fk_eva' => 'required|exists:evaact,Id_eva',
        ]);

        Anexos::create($request->all());

        return redirect()->route('anexos.index')->with('success', 'Anexo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anexos $anexos)
    {
        return view('anexos.show', compact('anexos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anexos $anexo)
    {
        
        $evaluaciones = Evaact::all();
        return view('anexos.edit', compact('anexo', 'evaluaciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anexos $anexo)
    {
        $request->validate([
            'Permisos' => 'required|string|max:60',
            'ApaMed' => 'required|string|max:255',
            'Herramienta' => 'required|string|max:255',
            'Duracion' => 'required|string|max:60',
            'Archivo' => 'required|string|max:60',
            'Fk_eva' => 'required|exists:evaact,Id_eva',
        ]);

        $anexo->update($request->all());

        return redirect()->route('anexos.index')->with('success', 'Anexo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anexos $anexo)
    {
        $anexo->delete();
        return redirect()->route('anexos.index')->with('success', 'Anexo eliminado correctamente.');
    }
}
