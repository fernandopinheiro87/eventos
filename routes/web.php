<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\EventController;

Route::post('/events', [EventController::class, 'store']);
Route::get('/', [EventController::class, 'index']);
Route::get('/events/{id}', [EventController::class, 'show']);
//middlwawre vai agir entre a ação de clicar no link até o view ser entregue 
//isto é, aqui neste exemplo, esta rota so vai ser acionado se o usuario estiver logado, ou seja, o usuario
//so vai conseguir criar evento se tiver logado. Se nao tiver logado, vai cair na tela de login.
Route::get('/events2/create', [EventController::class, 'create'])->middleware('auth');
Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth');
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->middleware('auth');
Route::put('/events/update/{id}', [EventController::class, 'update'])->middleware('auth');




Route::get('/contact', function () {
    return view('contact');
});


