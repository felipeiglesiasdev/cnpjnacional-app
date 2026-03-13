<?php

// NAMESPACE DO MODEL
namespace App\Models;

// IMPORTACAO DA CLASSE ELOQUENT MODEL
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// DECLARACAO DA CLASSE SIMPLES
class Simples extends Model
{
    // DEFINICAO DA CONEXAO ESPECIFICA SOLICITADA
    protected $connection = 'mysql_dados';

    // NOME EXATO DA TABELA CONFORME O SQL
    protected $table = 'simples';

    // DEFINICAO DA CHAVE PRIMARIA (CNPJ_BASICO)
    protected $primaryKey = 'cnpj_basico';

    // DEFINICAO DO TIPO DA CHAVE PRIMARIA COMO STRING (CHAR 8)
    protected $keyType = 'string';

    // DESATIVACAO DO AUTO INCREMENTO POIS A CHAVE NAO E NUMERICA
    public $incrementing = false;

    // DESATIVACAO DOS TIMESTAMPS POIS NAO EXISTEM NA TABELA
    public $timestamps = false;

    // ATRIBUTOS QUE PODEM SER PREENCHIDOS EM MASSA
    protected $fillable = [
        'cnpj_basico',
        'opcao_pelo_simples',
        'data_opcao_pelo_simples',
        'data_exclusao_do_simples',
        'opcao_pelo_mei',
        'data_opcao_pelo_mei',
        'data_exclusao_do_mei'
    ];

    // RELACIONAMENTO BASEADO NA CONSTRAINT: fk_simples_empresa
    public function empresa(): BelongsTo
    {
        // PERTENCE A UMA EMPRESA
        return $this->belongsTo(Empresa::class, 'cnpj_basico', 'cnpj_basico');
    }
}