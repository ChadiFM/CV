<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Asignatura;
use App\Models\Profesor;

class AsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Obtener todos los profesores
        $profesores = Profesor::all();

        $asignaturas = [
            ['nombre' => 'Matemáticas'],
            ['nombre' => 'Historia'],
            ['nombre' => 'Ciencias'],
            ['nombre' => 'Literatura'],
            ['nombre' => 'Arte'],

            ['nombre' => 'Fundamentos progrmacion'],
            ['nombre' => 'FOL'],
            ['nombre' => 'Backend'],
            ['nombre' => 'Frontend'],
            ['nombre' => 'Bases de datos'],
            // Puedes añadir más asignaturas según necesites
        ];

         // Insertar asignaturas en la tabla 'asignaturas' y asignar un profesor aleatorio
         // Iterar sobre las asignaturas y asignar un profesor aleatorio
        foreach ($asignaturas as $asignaturaData) {
            $asignatura = new Asignatura();
            $asignatura->nombre = $asignaturaData['nombre'];
            $asignatura->profesor_id = $profesores->random()->id; // Asignar un profesor aleatorio
            $asignatura->save();
        }
    }
}
