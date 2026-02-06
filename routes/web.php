<?php
use App\Http\Controllers\HomeController;                    // CONTROLLER DA HOME
use App\Http\Controllers\CnpjController;                    // CONTROLLER DA PÁGINA DE CNPJ
use App\Http\Controllers\RemocaoController;                 // CONTROLLER DE REMOÇÃO DE CNPJ
use App\Http\Controllers\ConsultaAvancadaController;        // CONTROLLER DA PÁGINA DE CONSULTA AVANÇADA
use Illuminate\Support\Facades\Route;
// --- PÁGINA INICIAL ---
Route::get('/', [HomeController::class, 'index'])->name('home');                                                                // PÁGINA PRINCIPAL
//########################################################################################################################
//########################################################################################################################
// --- ROTAS DE CNPJ ---
Route::post('/consultar', [CnpjController::class, 'consultar'])->name('cnpj.consultar');                                        // ROTA DO FORMULÁRIO DE CONSULTA
Route::get('/cnpj/{cnpj}', [CnpjController::class, 'show'])->name('cnpj.show');                                                 // ROTA DA PÁGINA DO CNPJ
//########################################################################################################################
//########################################################################################################################
// --- ROTAS DE REMOÇÃO DE DADOS ---
Route::get('/remocao-de-dados/{cnpj}', [RemocaoController::class, 'show'])->name('remocao.show');                               // MOSTRA PÁGINA DE REMOÇÃO
Route::post('/remocao-de-dados/{cnpj}', [RemocaoController::class, 'store'])->name('remocao.store');                            // PROCESSA O FORMULÁRIO
//########################################################################################################################
//########################################################################################################################
// --- ROTAS DE CONSULTA AVANÇADA ---
Route::get('/consulta-avancada', [ConsultaAvancadaController::class, 'index'])->name('consulta_avancada.index');                // MOSTRA A PÁGINA DE CONSULTA AVANÇADA
Route::get('/consulta-avancada/buscar', [ConsultaAvancadaController::class, 'search'])->name('consulta_avancada.search');       // PROCESSA A BUSCA AVANÇADA
//########################################################################################################################
//########################################################################################################################
// --- ROTAS DE POLÍTICA DE PRIVACIDADE ---
Route::view('/politica-de-privacidade', 'politica-privacidade')->name('politica_privacidade');                                  // PÁGINA POLÍTICA DE PRIVACIDADE