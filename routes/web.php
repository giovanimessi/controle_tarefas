<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefasController;
use App\Mail\MensagemEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;



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

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('home');

Route::prefix('painel')->middleware('auth','verified')->group(function(){
   Route::resource('tarefa', TarefasController::class);
});
Route::get('/mensagem-email',function(){

   return new MensagemEmail();

   //Mail::to('giovanidevelpment@gmail.com')->send(new MensagemEmail());
   //return 'E-mail enviado com sucesso';

});

