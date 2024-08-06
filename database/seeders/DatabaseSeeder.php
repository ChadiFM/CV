<?php

namespace Database\Seeders;

use App\Models\Alumno;

use App\Models\Asignatura;

use App\Models\Profesores;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         Alumno::factory(10)->create();
         Asignatura::factory(10)->create();
         Profesor::factory(10)->create();
       // User::factory()->create([
     //       'name' => 'Test User',
      //      'email' => 'test@example.com',
     //   ]);
//

    }
}
