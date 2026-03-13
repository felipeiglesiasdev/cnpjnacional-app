<?php

// NAMESPACE DO MODEL
namespace App\Models;

// IMPORTACAO DA CLASSE ELOQUENT MODEL
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// DECLARACAO DA CLASSE SOCIO
class Socio extends Model
{
    // DEFINICAO DA CONEXAO ESPECIFICA SOLICITADA
    protected $connection = 'mysql_dados';

    // NOME EXATO DA TABELA CONFORME O SQL
    protected $table = 'socios';

    // CHAVE PRIMARIA COMPOSTA CONFORME SQL (CNPJ_BASICO, CNPJ_CPF_SOCIO)
    protected $primaryKey = ['cnpj_basico', 'cnpj_cpf_socio'];

    // DESATIVACAO DO AUTO INCREMENTO DEVIDO A CHAVE COMPOSTA
    public $incrementing = false;

    // DESATIVACAO DOS TIMESTAMPS POIS NAO EXISTEM NA TABELA
    public $timestamps = false;

    // ATRIBUTOS QUE PODEM SER PREENCHIDOS EM MASSA
    protected $fillable = [
        'cnpj_basico',
        'identificador_socio',
        'nome_socio',
        'cnpj_cpf_socio',
        'qualificacao_socio',
        'data_entrada_sociedade',
        'pais',
        'representante_legal',
        'nome_representante',
        'qualificacao_representante_legal',
        'faixa_etaria'
    ];

    // RELACIONAMENTO BASEADO NA CONSTRAINT: fk_socios_empresa
    public function empresa(): belongsTo
    {
        // PERTENCE A UMA EMPRESA
        return $this->belongsTo(Empresa::class, 'cnpj_basico', 'cnpj_basico');
    }

    // RELACIONAMENTO BASEADO NA CONSTRAINT: fk_socios_pais
    public function paisRel(): belongsTo
    {
        // PERTENCE A UM PAIS
        return $this->belongsTo(Pais::class, 'pais', 'codigo');
    }

    // RELACIONAMENTO BASEADO NA CONSTRAINT: fk_socios_qualificacao
    public function qualificacaoSocioRel(): belongsTo
    {
        // PERTENCE A UMA QUALIFICACAO
        return $this->belongsTo(Qualificacao::class, 'qualificacao_socio', 'codigo');
    }

    // AVISO IMPORTANTE:
    // A COLUNA QUALIFICACAO_REPRESENTANTE_LEGAL EXISTE NA TABELA
    // POREM, NAO EXISTE NENHUMA CONSTRAINT DEFININDO-A COMO FOREIGN KEY NO SQL FORNECIDO
    // PORTANTO, NAO DECLAREI O RELACIONAMENTO AQUI PARA MANTER FIDELIDADE AO SCHEMA
}