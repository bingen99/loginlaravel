<?php

use App\Http\Controllers\alumnadocontroller;
use App\Http\Controllers\logincontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

*/

//Alumnos

Route::get('/alumnos', [alumnadocontroller::class, 'alumnos']);
Route::get('/alumnos/{id}', [alumnadocontroller::class, 'alumno'])->middleware('validarid');
Route::delete('/alumnos/{id}', [alumnadocontroller::class, 'borrar'])->middleware('validarid');
Route::post('/alumnos', [alumnadocontroller::class, 'crear']);
Route::put('/alumnos/{id}', [alumnadocontroller::class, 'editar'])->middleware('validarid');


//login

Route::post('/login', [logincontroller::class, 'login']); //ruta para comprobar correo y contraseña
Route::middleware('verification')->get('/usuario', [logincontroller::class, 'whoami']); //ruta para comprobar si el usuario esta logueado o no
Route::middleware('verification')->get('/logout', [logincontroller::class, 'logout']);
