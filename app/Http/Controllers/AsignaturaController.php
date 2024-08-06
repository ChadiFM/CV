<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las asignaturas con sus profesores relacionados
        //return Asignatura::with('profesor')->get();
        // Obtener todas las asignaturas con el nombre del profesor
        $asignaturas = Asignatura::with('profesor')->get();

        return response()->json($asignaturas);
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string',
            'profesor_id' => 'required|exists:profesores,id'
        ]);

        // Crear una nueva asignatura
        $asignatura = Asignatura::create([
            'nombre' => $request->nombre,
            'profesor_id' => $request->profesor_id
        ]);

        // Retornar la asignatura creada con el profesor relacionado cargado
        return response()->json($asignatura->load('profesor'), 201);
    }

    public function show(Asignatura $asignatura)
    {
        // Cargar una asignatura específica con el profesor relacionado
        return $asignatura->load('profesor');
    }

    public function update(Request $request, Asignatura $asignatura)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string',
            'profesor_id' => 'required|exists:profesores,id'
        ]);

        // Actualizar los datos de la asignatura
        $asignatura->update([
            'nombre' => $request->nombre,
            'profesor_id' => $request->profesor_id
        ]);

        // Retornar la asignatura actualizada con el profesor relacionado cargado
        return response()->json($asignatura->load('profesor'), 200);
    }

    public function destroy(Asignatura $asignatura)
    {
        // Eliminar la asignatura
        $asignatura->delete();

        // Retornar una respuesta HTTP sin contenido
        return response()->json(null, 204);
    }
}
