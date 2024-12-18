<?php

namespace App\Http\Controllers;

use App\Models\Instruccione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Usuario;

class InstruccioneController extends Controller
{
    public function index()
{
    $instrucciones = Instruccione::with('usuario')->paginate(10);
    return view('instruccione.index', compact('instrucciones'));
}
    

public function create()
{
    $usuarios = Usuario::all();
    $instruccione = new Instruccione();
    return view('instruccione.create', compact('instruccione', 'usuarios'));
}


public function store(Request $request)
{
    $validated = $request->validate([
        'Codigo' => 'required|string|max:255',
        'Nomins' => 'required|string|max:255',
        'FechRev' => 'required|date',
        'FechEmi' => 'required|date',
        'FechProx' => 'required|date',
        'EstRev' => 'required|integer|in:1,2,3',
        'ResRev' => 'nullable|integer|exists:usuarios,Id_usu', // Validar que exista en la tabla usuarios
        'ClasInstr' => 'required|integer|in:1,2,3',
        'Nivel' => 'required|integer',
        'Procedimiento' => 'nullable|file|mimes:txt',
        'Programa' => 'nullable|file|mimes:doc,docx',
        'Lista' => 'nullable|file|mimes:doc,docx',
        'Cuestionario' => 'nullable|file|mimes:doc,docx',
        'Guia' => 'nullable|file|mimes:doc,docx',
        'Ciclo' => 'nullable|file|mimes:vsd,vsdx',
        'Diagrama' => 'nullable|file|mimes:doc,docx',
        'Desarrollo' => 'nullable|file|mimes:doc,docx',
        'Portada' => 'nullable|file|mimes:pdf',
    ]);

    Instruccione::create($validated);

    return redirect()->route('instrucciones.index')->with('success', 'Instrucción creada correctamente.');
}

    

public function edit($id)
{
    $instruccione = Instruccione::findOrFail($id);
    $usuarios = Usuario::all();
    return view('instruccione.edit', compact('instruccione', 'usuarios'));
}


public function update(Request $request, $id)
{
    $validated = $request->validate([
        'Codigo' => 'required|string|max:255',
        'Nomins' => 'required|string|max:255',
        'FechRev' => 'required|date',
        'FechEmi' => 'required|date',
        'FechProx' => 'required|date',
        'EstRev' => 'required|integer|in:1,2,3',
        'ResRev' => 'nullable|integer|exists:usuarios,Id_usu',
        'ClasInstr' => 'required|integer|in:1,2,3',
        'Nivel' => 'required|integer',
        'Procedimiento' => 'nullable|file|mimes:txt',
        'Programa' => 'nullable|file|mimes:doc,docx',
        'Lista' => 'nullable|file|mimes:doc,docx',
        'Cuestionario' => 'nullable|file|mimes:doc,docx',
        'Guia' => 'nullable|file|mimes:doc,docx',
        'Ciclo' => 'nullable|file|mimes:vsd,vsdx',
        'Diagrama' => 'nullable|file|mimes:doc,docx',
        'Desarrollo' => 'nullable|file|mimes:doc,docx',
        'Portada' => 'nullable|file|mimes:pdf',
    ]);

    $instruccione = Instruccione::findOrFail($id);
    $instruccione->update($validated);

    return redirect()->route('instrucciones.index')->with('success', 'Instrucción actualizada correctamente.');
}


    public function destroy($id)
    {
        $instruccione = Instruccione::findOrFail($id);
        foreach (['Procedimiento', 'Programa', 'Lista', 'Cuestionario', 'Guia', 'Ciclo', 'Diagrama', 'Desarrollo', 'Portada'] as $field) {
            if ($instruccione->$field) {
                Storage::delete($instruccione->$field);
            }
        }
        $instruccione->delete();
        return redirect()->route('instrucciones.index')->with('success', 'Instrucción eliminada correctamente.');
    }
}
