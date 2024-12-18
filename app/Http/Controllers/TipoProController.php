<?php
namespace App\Http\Controllers;

use App\Models\Tipopro;
use Illuminate\Http\Request;

class TipoProController extends Controller
{
    public function index()
    {
        $tipopros = Tipopro::paginate(10); // Paginar resultados
        return view('tipo-pro.index', compact('tipopros'));
    }

    public function create()
    {
        $tipoPro = new Tipopro();
        return view('tipo-pro.create', compact('tipoPro'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'TipoPro' => 'required|string|max:255',
            'Clave' => 'required|string|max:255',
        ]);

        Tipopro::create($validated);

        return redirect()->route('tipo-pros.index')
            ->with('success', 'Registro creado correctamente.');
    }

    public function show($id)
    {
        $tipoPro = Tipopro::findOrFail($id);
        return view('tipo-pro.show', compact('tipoPro'));
    }

    public function edit($id)
    {
        $tipoPro = Tipopro::findOrFail($id);
        return view('tipo-pro.edit', compact('tipoPro'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'TipoPro' => 'required|string|max:255',
            'Clave' => 'required|string|max:255',
        ]);

        $tipoPro = Tipopro::findOrFail($id);
        $tipoPro->update($validated);

        return redirect()->route('tipo-pros.index')
            ->with('success', 'Registro actualizado correctamente.');
    }

    public function destroy($id)
    {
        $tipoPro = Tipopro::findOrFail($id);
        $tipoPro->delete();

        return redirect()->route('tipo-pros.index')
            ->with('success', 'Registro eliminado correctamente.');
    }
}
