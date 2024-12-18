<?php

namespace App\Http\Controllers;

use App\Models\Tablacontabi;
use App\Models\Usuario;
use App\Models\Instruccione;
use App\Models\Sector;
use Illuminate\Http\Request;

class TablacontabiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tablacontabis = Tablacontabi::with(['usuario', 'categoria','supervisador','evaluador','sectores','instruccione'])->get(); 
        return view('tablacontabis.index', compact('tablacontabis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = Usuario::all();
        $instrucciones = Instruccione::all();
        $sectores = Sector::all();
        return view('tablacontabis.create', compact('usuarios', 'instrucciones', 'sectores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Fk_usu' => 'required|exists:usuarios,id_usu',
            'Fk_cat' => 'required|exists:usuarios,Fk_cat',
            'Fk_ins' => 'required|exists:instrucciones,Id_ins',
            'FechComunic' => 'nullable|date',
            'FechCumplim' => 'nullable|date',
            'Fk_sect' => 'required|exists:sectores,Id_sect',
            'ListaCump' => 'required|string|max:255',
            'ListaCom' => 'required|string|max:255',
            'Cuestionario' => 'required|string|max:255',
            'Ciclo' => 'required|string|max:255',
            'Calificacion' => 'required|integer|max:11',
            'Aprobacion' => 'required|string|max:255',
            'Observaciones' => 'required|string|max:255',
            'Ciclo1' => 'required|string|max:255',
            'Ciclo2' => 'required|string|max:255',
            'Ciclo3' => 'required|string|max:255',
            'Fk_evaluador' => 'required|exists:usuarios,id_usu',
            'Fk_super' => 'required|exists:usuarios,id_usu',
        ]);

        Tablacontabi::create($request->all());

        return redirect()->route('tablacontabis.index')->with('success', 'Tabla creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tablacontabi $tablacontabi)
    {
        return view('tablacontabis.show', compact('tablacontabi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tablacontabi $tablacontabi)
    {
        $usuarios = Usuario::all();
        $instrucciones = Instruccione::all();
        $sectores = Sector::all();
        return view('tablacontabis.edit', compact('tablacontabi', 'usuarios','instrucciones', 'sectores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tablacontabi $tablacontabi)
    {
        $request->validate([
            'Fk_usu' => 'required|exists:usuarios,id_usu',
            'Fk_cat' => 'required|exists:usuarios,Fk_cat',
            'Fk_ins' => 'required|exists:instrucciones,Id_ins',
            'FechComunic' => 'nullable|date',
            'FechCumplim' => 'nullable|date',
            'Fk_sect' => 'required|exists:sectores,Id_sect',
            'ListaCump' => 'required|string|max:255',
            'ListaCom' => 'required|string|max:255',
            'Cuestionario' => 'required|string|max:255',
            'Ciclo' => 'required|string|max:255',
            'Calificacion' => 'required|integer|max:11',
            'Aprobacion' => 'required|string|max:255',
            'Observaciones' => 'required|string|max:255',
            'Ciclo1' => 'required|string|max:255',
            'Ciclo2' => 'required|string|max:255',
            'Ciclo3' => 'required|string|max:255',
            'Fk_evaluador' => 'required|exists:usuarios,id_usu',
            'Fk_super' => 'required|exists:usuarios,id_usu',
        ]);

        $tablacontabi->update($request->all());

        return redirect()->route('tablacontabis.index')->with('success', 'Tabla actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tablacontabi $tablacontabi)
    {
        $tablacontabi->delete();
        return redirect()->route('tablacontabis.index')->with('success', 'Tabla de contabilidad eliminada.');
    }
}
