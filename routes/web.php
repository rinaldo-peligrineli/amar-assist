<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\ContatoTelefoneController;
use App\Http\Controllers\ContatoEmailController;
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
Route::get('/contato', [ContatoController::class, 'index'])->name('contato.index');
Route::get('/contato/create', [ContatoController::class, 'create'])->name('contato.create');
Route::get('/contato/show/{id}', [ContatoController::class, 'show'])->name('contato.show');
Route::post('/contato/store', [ContatoController::class, 'store'])->name('contato.store');
Route::post('/contato/update/', [ContatoController::class, 'update'])->name('contato.update');
Route::get('/contato/edit/{id}', [ContatoController::class, 'edit'])->name('contato.edit');
Route::get('/contato/index', [ContatoController::class, 'index'])->name('contato.index');
Route::delete('/contato/delete/{id}', 'ContatoController@destroy')->name('contato.delete');

Route::post('/contato-telefone/store', [ContatoTelefoneController::class, 'store'])->name('contato-telefone.store');
Route::post('/contato-telefone/edit/{id}', [ContatoTelefoneController::class, 'edit'])->name('contato-telefone.edit');
Route::put('/contato-telefone/update/', [ContatoTelefoneController::class, 'update'])->name('contato-telefone.update');
Route::get('/contato-telefone/index', [ContatoTelefoneController::class, 'index'])->name('contato-telefone.index');
Route::delete('/contato-telefone/delete/{id}', 'ContatoTelefoneController@destroy')->name('contato-telefone.delete');

Route::post('/contato-email/store', [ContatoEmailController::class, 'store'])->name('contato-email.store');
Route::put('/contato-email/update/', [ContatoEmailController::class, 'update'])->name('contato-email.update');
Route::get('/contato-email/index', [ContatoEmailController::class, 'index'])->name('contato-email.index');
Route::delete('/contato-email/delete/{id}', 'ContatoEmailController@destroy')->name('contato-telefone.delete');
