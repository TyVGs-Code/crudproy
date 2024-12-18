<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;

class SectoresController extends Controller
{
    // Mostrar todos los sectores
    public function index()
    {
        $sectores = Sector::all();
        return view('sectores.index', compact('sectores'));
    }

    // Mostrar el formulario para crear un nuevo sector
    public function create()
    {
        return view('sectores.create');
    }

    // Almacenar un nuevo sector
    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string|max:60',
            'Personal_sect' => 'required|integer',
        ]);

        Sector::create($request->all());
        return redirect()->route('sectores.index')->with('success', 'Sector creado con éxito.');
    }

    // Mostrar el formulario para editar un sector
    public function edit(Sector $sectore)
    {
        return view('sectores.edit', compact('sectore'));
    }

    // Actualizar un sector existente
    public function update(Request $request, Sector $sector)
    {
        $request->validate([
            'Nombre' => 'required|string|max:60',
            'Personal_sect' => 'required|integer',
        ]);

        $sector->update($request->all());

        return redirect()->route('sectores.index')->with('success', 'Sector actualizado con éxito.');
    }

    // Eliminar un sector
    public function destroy(Sector $sector)
    {
        $sector->delete();
        return redirect()->route('sectores.index')->with('success', 'Sector eliminado con éxito.');
    }

    // Mostrar usuarios del sector
    public function usuarios($sectore)
    {
        $sector = Sector::findOrFail($sectore);
        $usuarios = $sector->usuarios;

        // Depuración: Verifica los usuarios y el sector
       // dd($usuarios, $sector);  // Esto mostrará los datos en la pantalla

        return view('sectores.usuarios', compact('sector', 'usuarios'));
    }

}
