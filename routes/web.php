<?php

use Illuminate\Support\Facades\Route;
use Htpp\Middleware\CorsMiddleware;




use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\ProfesorController;

Route::get('/', function () {
    return view('welcome');
});


/* Route::middleware('cors')->group(function () {
    Route::get('/alumnos', [AlumnoController::class, 'index']); // Ejemplo de GET para obtener todos los alumnos
    Route::post('/alumnos', [AlumnoController::class, 'store']); // Ejemplo de POST para crear un alumno
    Route::put('/alumnos/{id}', [AlumnoController::class, 'update']); // Ejemplo de PUT para actualizar un alumno
    Route::delete('/alumnos/{id}', [AlumnoController::class, 'destroy']); // Ejemplo de DELETE para eliminar un alumno
}); */
Route::get('/alumnos', [AlumnoController::class, 'index']);
Route::post('/alumnos', [AlumnoController::class, 'store']);
Route::get('/alumnos/{alumno}', [AlumnoController::class, 'show'])->name('alumnos.show');
Route::delete('/alumnos/{id}', [AlumnoController::class, 'destroy'])->name('alumnos.destroy');
Route::get('/alumnos/{id}/asignaturas', [AlumnoController::class, 'asignaturas']);
Route::post('/alumnos/{alumnoId}/asignaturas/{asignaturaId}', [AlumnoController::class, 'inscribir']);
/* Route::apiResource('alumnos', AlumnoController::class);
Route::apiResource('asignaturas', AsignaturaController::class);
 */
Route::get('/profesores', [ProfesorController::class, 'index']);
Route::delete('/profesor/{id}', [ProfesorController::class, 'destroy']);
////
Route::get('/asignaturas', [AsignaturaController::class, 'index']);

