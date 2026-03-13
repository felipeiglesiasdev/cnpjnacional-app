<?php

// NAMESPACE DO MODEL
namespace App\Models;

// IMPORTACAO DA CLASSE ELOQUENT MODEL
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

// DECLARACAO DA CLASSE EMPRESA
class Empresa extends Model
{
    // DEFINICAO DA CONEXAO ESPECIFICA SOLICITADA
    protected $connection = 'mysql_dados';

    // NOME EXATO DA TABELA CONFORME O SQL
    protected $table = 'empresas';

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
        'razao_social',
        'natureza_juridica',
        'qualificacao_responsavel',
        'capital_social',
        'porte_empresa',
        'ente_federativo_responsavel'
    ];

    // RELACIONAMENTO BASEADO NA CONSTRAINT: empresas_ibfk_1
    public function naturezaJuridicaRel(): BelongsTo
    {
        // PERTENCE A UMA NATUREZA JURIDICA
        return $this->belongsTo(NaturezaJuridica::class, 'natureza_juridica', 'codigo');
    }

    // RELACIONAMENTO BASEADO NA CONSTRAINT: empresas_ibfk_2
    public function qualificacaoResponsavelRel(): BelongsTo
    {
        // PERTENCE A UMA QUALIFICACAO
        return $this->belongsTo(Qualificacao::class, 'qualificacao_responsavel', 'codigo');
    }

    // RELACIONAMENTO INVERSO BASEADO NA CONSTRAINT: fk_simples_empresa
    public function simples(): HasOne
    {
        // POSSUI UM REGISTRO NA TABELA SIMPLES
        return $this->hasOne(Simples::class, 'cnpj_basico', 'cnpj_basico');
    }

    // RELACIONAMENTO INVERSO BASEADO NA CONSTRAINT: fk_socios_empresa
    public function socios(): HasMany
    {
        // POSSUI MUITOS REGISTROS NA TABELA SOCIOS
        return $this->hasMany(Socio::class, 'cnpj_basico', 'cnpj_basico');
    }
}