<?php

namespace App\Http\Controllers;

use App\Models\Formato;
use App\Models\Instruccione; // Importa el modelo Instruccione
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class FormatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        
        $instruccionId = $request->input('instruccion_id');

    $query = Formato::query();
    if ($instruccionId) {
        $query->where('Ins', $instruccionId);
    }

    $formatos = $query->paginate();

    return view('formato.index', compact('formatos'))
        ->with('i', ($request->input('page', 1) - 1) * $formatos->perPage());

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $formato = new Formato(); 
        $instrucciones = Instruccione::all(); // Obtén todas las instrucciones
      

        return view('formato.create', compact('formato', 'instrucciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'Formato' => 'required|string|max:255',
            'FechaC' => 'required|date',
            'Ins' => 'required|integer|exists:instrucciones,Id_ins',
            'InstruccionFile' => 'nullable|file|mimes:doc,docx,pdf|max:2048', // Validación del archivo
        ]);
    
        // Subir archivo si existe
        if ($request->hasFile('InstruccionFile')) {


            $validated['InstruccionFile'] = $request->file('InstruccionFile')->store('instrucciones', 'public');

            // $validated['InstruccionFile'] = $request->file('InstruccionFile')->store('public/instrucciones');
        }
    
        Formato::create($validated);
    
        return redirect()->route('formatos.index')->with('success', 'Formato creado correctamente.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
       
        $formato = Formato::findOrFail($id);

        // Generar la URL pública del archivo (si existe)
        $archivoUrl = $formato->InstruccionFile ? Storage::url($formato->InstruccionFile) : null;
    
        // Verificar si el archivo es de tipo Word o PDF
        $archivoEsWord = false;
        $archivoEsPdf = false;
        if ($archivoUrl) {
            $extensionesCompatibles = ['.doc', '.docx'];
            foreach ($extensionesCompatibles as $extension) {
                if (str_ends_with($archivoUrl, $extension)) {
                    $archivoEsWord = true;
                    break;
                }
            }
    
            // Verificar si es PDF
            if (str_ends_with($archivoUrl, '.pdf')) {
                $archivoEsPdf = true;
            }
        }
    
        return view('formato.show', compact('formato', 'archivoUrl', 'archivoEsWord', 'archivoEsPdf'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $formato = Formato::findOrFail($id); // Encuentra el formato a editar
        $instrucciones = Instruccione::all(); // Obtén todas las instrucciones

        return view('formato.edit', compact('formato', 'instrucciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
{
    $validated = $request->validate([
        'Formato' => 'required|string|max:255',
        'FechaC' => 'required|date',
        'Ins' => 'required|integer|exists:instrucciones,Id_ins',
        'InstruccionFile' => 'nullable|file|mimes:doc,docx,pdf|max:2048',
    ]);

    $formato = Formato::findOrFail($id);

    if ($request->hasFile('InstruccionFile')) {
        if ($formato->InstruccionFile) {
            Storage::delete($formato->InstruccionFile);
        }
        $validated['InstruccionFile'] = $request->file('InstruccionFile')->store('instrucciones', 'public');
    }

    $formato->update($validated);

    return redirect()->route('formatos.index')->with('success', 'Formato actualizado correctamente.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $formato = Formato::findOrFail($id); // Asegúrate de que el registro exista
        $formato->delete();

        return redirect()->route('formatos.index')->with('success', 'Formato eliminado correctamente.');
    }
}
