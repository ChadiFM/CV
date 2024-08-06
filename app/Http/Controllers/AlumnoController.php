<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Asignatura;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();

    return response()->json($alumnos);

    }

    public function store(Request $request)
    {
        // Validar los datos del request
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
        ]);

        // Crear un nuevo alumno
        $alumno = Alumno::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
        ]);

        // Retornar la respuesta con el nuevo alumno
        return response()->json($alumno, 201);
    }




    public function show(Alumno $alumno)
    {
        return $alumno->load('asignaturas.profesor');
    }

    public function update(Request $request, Alumno $alumno)
    {
        $alumno->update($request->all());
        $alumno->asignaturas()->sync($request->asignaturas);
        return response()->json($alumno->load('asignaturas.profesor'), 200);
    }

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return response()->json(['message' => 'Alumno eliminado correctamente']);
    }

    public function asignaturas($id)
    {
        $alumno = Alumno::findOrFail($id);
        $asignaturas = $alumno->asignaturas;

        return response()->json($asignaturas);
    }

    public function inscribir($alumnoId, $asignaturaId)
    {
        try {
            $alumno = Alumno::findOrFail($alumnoId);
            $asignatura = Asignatura::findOrFail($asignaturaId);

            // Verifica si ya está inscrito en la asignatura
            if (!$alumno->asignaturas->contains($asignaturaId)) {
                $alumno->asignaturas()->attach($asignaturaId);
            }

            return response()->json(['message' => 'Asignatura agregada correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al agregar asignatura', 'message' => $e->getMessage()], 500);
        }
    }


}

