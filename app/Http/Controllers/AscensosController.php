<?php

// AscensosController.php

namespace App\Http\Controllers;

use App\Models\Ascenso;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AscensosController extends Controller
{
    public function index()
    {
        // Cargar las relaciones 'ascendido' y 'vacante' de los ascensos
        $ascensos = Ascenso::with(['ascendido', 'vacante'])->get(); 
        return view('ascensos.index', compact('ascensos'));
    }

    public function create()
    {
        $usuarios = Usuario::all(); // Cargar usuarios para el dropdown
        return view('ascensos.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Fk_ascendido' => 'required|exists:usuarios,id_usu',
            'Fk_vacante' => 'nullable|integer',
            'Fechainicio' => 'required|date',
            'Fechafin' => 'nullable|date',
            'estatus' => 'required|string|max:255',
        ]);

        Ascenso::create($request->all());

        return redirect()->route('ascensos.index')->with('success', 'Ascenso creado exitosamente.');
    }

    public function show(Ascenso $ascenso)
    {
        return view('ascensos.show', compact('ascenso'));
    }

    public function edit(Ascenso $ascenso)
    {
        $usuarios = Usuario::all();
        return view('ascensos.edit', compact('ascenso', 'usuarios'));
    }

    public function update(Request $request, Ascenso $ascenso)
    {
        $request->validate([
            'Fk_ascendido' => 'required|exists:usuarios,id_usu',
            'Fk_vacante' => 'nullable|integer',
            'Fechainicio' => 'required|date',
            'Fechafin' => 'nullable|date',
            'estatus' => 'required|string|max:255',
        ]);

        $ascenso->update($request->all());

        return redirect()->route('ascensos.index')->with('success', 'Ascenso actualizado exitosamente.');
    }

    public function destroy(Ascenso $ascenso)
    {
        $ascenso->delete();
        return redirect()->route('ascensos.index')->with('success', 'Ascenso eliminado.');
    }
}

