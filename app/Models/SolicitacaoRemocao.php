<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitacaoRemocao extends Model
{
    use HasFactory;

    // Define explicitamente o nome da tabela
    protected $table = 'solicitacoes_remocao';

    // Garante o uso da conexão padrão do Laravel
    protected $connection = 'mysql'; 

    protected $fillable = [
        'cnpj',
        'razao_social',
        'ip_solicitante',
        'user_agent',
        'aceitou_termos_dados_publicos',
        'aceitou_termos_google',
        'removido_em'
    ];

    protected $casts = [
        'removido_em' => 'datetime',
        'aceitou_termos_dados_publicos' => 'boolean',
        'aceitou_termos_google' => 'boolean',
    ];
}