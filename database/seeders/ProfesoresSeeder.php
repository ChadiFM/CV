<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Profesor;


class ProfesoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Profesor::factory()->count(10)->create();
    }
}
