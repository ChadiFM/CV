<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Profesor extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellidos'];

    protected $table = 'profesores';

    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class);
    }
}
