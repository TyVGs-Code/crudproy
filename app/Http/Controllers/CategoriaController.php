<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Mostrar todas las categorías
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    // Mostrar el formulario para crear una nueva categoría
    public function create()
    {
        return view('categorias.create');
    }

    // Almacenar una nueva categoría
    public function store(Request $request)
    {
        $request->validate([
            'Categoria' => 'required|string|max:60',
            'Nivel' => 'required|integer|max:40',
        ]);

        Categoria::create($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoría creada con éxito.');
    }

    // Mostrar el formulario para editar una categoría
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    // Actualizar una categoría existente
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'Categoria' => 'required|string|max:60',
            'Nivel' => 'required|integer|max:40',
        ]);

        $categoria->update($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada con éxito.');
    }

    // Eliminar una categoría
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada con éxito.');
    }
}
