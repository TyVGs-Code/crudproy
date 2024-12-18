<?php

namespace App\Http\Controllers;

use App\Models\Reglamento;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ReglamentoController extends Controller
{
    public function index()
    {
        // Primero, corregiremos la relación de categorías
        $reglamentos = Reglamento::with('categorias')->get();

        // Si necesitas mostrar las categorías de una manera específica
        $reglamentos = $reglamentos->map(function ($reglamento) {
            // Obtener nombres de categorías
            $reglamento->categoriasNombres = $reglamento->categorias->pluck('Categoria')->implode(', ');
            return $reglamento;
        });

        return view('reglamentos.index', compact('reglamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'origen' => 'required|max:60',
            'obligacion' => 'required|max:100',
            'tipo' => 'required|max:20',
            'Fk_cat' => 'required|array',
        ]);

        try {
            $reglamento = Reglamento::create([
                'origen' => $request->origen,
                'obligacion' => $request->obligacion,
                'tipo' => $request->tipo,
            ]);

            $reglamento->categorias()->attach($request->Fk_cat);

            return redirect()->route('reglamentos.index')
                ->with('success', 'Reglamento creado exitosamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al crear el reglamento: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $reglamento = Reglamento::findOrFail($id);
        $categorias = Categoria::all();
        $categoriasSeleccionadas = $reglamento->categorias->pluck('id_cat')->toArray();

        return view('reglamentos.edit', compact('reglamento', 'categorias', 'categoriasSeleccionadas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'origen' => 'required|max:60',
            'obligacion' => 'required|max:100',
            'tipo' => 'required|max:20',
            'Fk_cat' => 'required|array',
        ]);

        try {
            $reglamento = Reglamento::findOrFail($id);

            $reglamento->update([
                'origen' => $request->origen,
                'obligacion' => $request->obligacion,
                'tipo' => $request->tipo,
            ]);

            // Sincronizar categorías
            $reglamento->categorias()->sync($request->Fk_cat);

            return redirect()->route('reglamentos.index')
                ->with('success', 'Reglamento actualizado exitosamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al actualizar el reglamento: ' . $e->getMessage());
        }
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('reglamentos.create', compact('categorias'));
    }
    public function destroy($id)
    {
        try {
            $reglamento = Reglamento::findOrFail($id);
            $reglamento->delete();

            return redirect()->route('reglamentos.index')
                ->with('success', 'Reglamento eliminado exitosamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al eliminar el reglamento: ' . $e->getMessage());
        }
    }
}