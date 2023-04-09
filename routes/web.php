<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  




// Todas as Listings

Route::get('/', [ListingController::class, 'index']);


//Mostrar e criar form 
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Guardar Dados
Route::post('/listings/', [ListingController::class, 'store'])->middleware('auth');

//Mostrar formulario para editar
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Update depois do edit = o submit 
Route::put('/listings/{listing}',[ListingController::class, 'update'])->middleware('auth');

//Delete / Apagar a lista
Route::delete('/listings/{listing}',[ListingController::class, 'destroy'])->middleware('auth');

// Ver tickets user
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Single Listing sempre no fim
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Formulario de Registro
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Criar novo utilizador
Route::post('/users', [UserController::class, 'store']);

//Logout 
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Mostrar form do login
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Log In puro / submit formulario login
Route::post('/users/authenticate', [UserController::class, 'authenticate']);




