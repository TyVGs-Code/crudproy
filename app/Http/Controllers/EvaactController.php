<?php

namespace App\Http\Controllers;

use App\Models\Evaact;
use App\Models\Instruccione;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class EvaactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $evaacts = Evaact::paginate();

        return view('evaacts.index', compact('evaacts'))
            ->with('i', ($request->input('page', 1) - 1) * $evaacts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $instrucciones = Instruccione::all(); // Obtén todas las instrucciones
        $categorias = Categoria::all();
        $evaact = new Evaact(); // Nueva instancia para el formulario

        return view('evaacts.create', compact('evaact', 'instrucciones', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'NomAct' => 'required|string|max:100',
            'Fecha' => 'required|date',
            'Clasificacion' => 'required|string|max:50',
            'Tipo' => 'required|string|max:50',
            'Frecuencia' => 'required|string|max:50',
            'Status' => 'required|string|max:50',
            'Fk_ins' => 'required|integer|exists:instrucciones,Id_ins',
            'Fk_cat' => 'required|integer|exists:categorias,id_cat',
            'Archivo' => 'nullable|file|mimes:doc,docx,pdf|max:2048', // Validación del archivo
        ]);
    
        // Subir archivo si existe
        if ($request->hasFile('Archivo')) {
            $validated['Archivo'] = $request->file('Archivo')->store('/uploads/archivos');
        }
    
        Evaact::create($validated);
    
        return redirect()->route('evaacts.index')->with('success', 'Actividad creada correctamente.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Evaact $evaact)
    {

        return view('evaacts.show', compact('evaact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaact $evaact)
    {
        $instrucciones = Instruccione::all(); // Obtén todas las instrucciones
        $categorias = Categoria::all();
        return view('evaacts.edit', compact('evaact', 'instrucciones', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Evaact $evaact)
{
    $validated = $request->validate([
        'NomAct' => 'required|string|max:100',
        'Fecha' => 'required|date',
        'Clasificacion' => 'required|string|max:50',
        'Tipo' => 'required|string|max:50',
        'Frecuencia' => 'required|string|max:50',
        'Status' => 'required|string|max:50',
        'Fk_ins' => 'required|integer|exists:instrucciones,Id_ins',
        'Fk_cat' => 'required|integer|exists:categorias,id_cat',
        'Archivo' => 'nullable|file|mimes:doc,docx,pdf|max:2048', // Validación del archivo
    ]);

    // Subir archivo si existe
    if ($request->hasFile('Archivo')) {
        $validated['Archivo'] = $request->file('Archivo')->store('/uploads/archivos');
    }

    $evaact->update($validated);

    return redirect()->route('evaacts.index')->with('success', 'Evaluación actualizado correctamente.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaact $evaact)
    {
        $evaact->delete();
        return redirect()->route('evaacts.index')->with('success', 'Evaluación eliminado correctamente.');
    }
}

