<?php
use App\Http\Controllers\HomeController;            // CONTROLLER DA HOME
use App\Http\Controllers\CnpjController;            // CONTROLLER DA HOME
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');                                                // PÁGINA PRINCIPAL
//########################################################################################################################
//########################################################################################################################
// --- ROTAS DE CNPJ ---
Route::post('/consultar', [CnpjController::class, 'consultar'])->name('cnpj.consultar');                        // ROTA DO FORMULÁRIO DE CONSULTA
Route::get('/cnpj/{cnpj}', [CnpjController::class, 'show'])->name('cnpj.show');                                 // ROTA DA PÁGINA DO CNPJ
