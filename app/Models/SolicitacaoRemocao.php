<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitacaoRemocao extends Model
{
    use HasFactory;

    protected $table = 'solicitacoes_remocao';

    protected $fillable = [
        'cnpj',
        'nome_responsavel',
        'confirmou_nao_divulgamos',
        'ciente_dados_publicos',
        'ciente_prazo_busca',
    ];
}
