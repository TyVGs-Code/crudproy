<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Categoria;
use App\Models\Sector;
use Barryvdh\DomPDF\Facade\Pdf;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Listar a todos los usuarios
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los sectores
        $sectores = Sector::all();

        // Obtener todas las categorías
        $categorias = Categoria::all();

        // Pasar ambas variables a la vista
        return view('usuarios.create', compact('sectores', 'categorias'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'Ficha' => 'required|string|max:50',
            'Nombre' => 'required|string|max:60',
            'Appa' => 'required|string|max:60',
            'Apma' => 'required|string|max:60',
            'Nac' => 'required|date',
            'RFC' => 'required|string|min:12|max:13', 
            'Fk_cat' => 'nullable|integer',
            'Fk_sectores' => 'nullable|integer',
            'Correo' => 'required|email|max:30',
            'Correo2' => 'nullable|email|max:30',
            'Telefono' => 'required|string|max:12',
            'Password' => 'required|string|max:255',
            'Tiposangre' => 'required|string|max:5',
            'Vacofic' => 'required|date',
            'Vacprog' => 'required|date',
            'Jornada' => 'nullable|string|max:12',
            'Camisa' => 'required|string|max:30',
            'Pantalon' => 'required|string|max:30',
            'Zapatos' => 'required|string|max:30',
            'Condmedica' => 'nullable|string|max:30',
            'Estatus' => 'required|string|max:1',

        ]);



        // Crear el nuevo usuario
        Usuario::create($validatedData);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado con éxito.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuario::findOrFail($id); // Encuentra el usuario por ID o lanza un 404 si no existe
        return view('usuarios.show', compact('usuario'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $usuario = Usuario::findOrFail($id);
    $categorias = Categoria::all(); // Asegúrate de pasar todas las categorías necesarias
    $sectores = Sector::all(); // Asegúrate de pasar todos los sectores necesarios

    return view('usuarios.edit', compact('usuario', 'categorias', 'sectores'));
}



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
        $validatedData = $request->validate([
            'Ficha' => 'required|string|max:50',
            'Nombre' => 'required|string|max:60',
            'Appa' => 'required|string|max:60',
            'Apma' => 'required|string|max:60',
            'Nac' => 'date',
            'RFC' => 'string|min:12|max:13', 
            'Fk_cat' => 'integer',
            'Fk_sectores' => 'integer',
            'Correo' => 'email|max:30',
            'Correo2' => 'nullable|email|max:30',
            'Telefono' => 'string|max:12',
            'Password' => 'string|max:255',
            'Tiposangre' => 'required|string|max:5',
            'Vacofic' => 'date',
            'Vacprog' => 'date',
            'Jornada' => 'string|max:12',
            'Camisa' => 'string|max:30',
            'Pantalon' => 'string|max:30',
            'Zapatos' => 'string|max:30',
            'Condmedica' => 'nullable|string|max:30',
            'Estatus' => 'string|max:1',
        ]);

        $usuario->update($validatedData);
        $usuario->update($request->all());
        return redirect()->route('usuarios.index')->with('success', 'Usuario Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario Eliminado Correctamente');
    }



    public function exportPdf(Request $request)
    {
        // Obtener los atributos seleccionados desde el formulario
        $attributes = $request->input('attributes', []);

        // Verificar si se seleccionaron atributos
        if (empty($attributes)) {
            return back()->with('error', 'No se seleccionaron atributos');
        }

        // Validar que los atributos seleccionados sean columnas válidas de la base de datos
        $validAttributes = [
            'id_usu',
            'Ficha',
            'Nombre',
            'Appa',
            'Apma',
            'Nac',
            'RFC',
            'Correo',
            'Correo2',
            'Telefono',
            'Tiposangre',
            'Vacofic',
            'Vacprog',
            'Jornada',
            'Camisa',
            'Pantalon',
            'Zapatos',
            'Condmedica',
            'Estatus'
        ];

        // Filtrar solo los atributos válidos
        $attributes = array_intersect($attributes, $validAttributes);

        // Obtener los usuarios solo con los atributos seleccionados
        $usuarios = Usuario::select($attributes)->get();

        // Generar el PDF con la vista 'usuarios.pdf'
        $pdf = PDF::loadView('usuarios.pdf', ['usuarios' => $usuarios]);

        // Descargar el PDF
        return $pdf->download('usuarios.pdf');
    }








}

