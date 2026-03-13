<?php

// NAMESPACE DO MODEL
namespace App\Models;

// IMPORTACAO DA CLASSE ELOQUENT MODEL
use Illuminate\Database\Eloquent\Model;

// DECLARACAO DA CLASSE ESTABELECIMENTO
class Estabelecimento extends Model
{
    // DEFINICAO DA CONEXAO ESPECIFICA SOLICITADA
    protected $connection = 'mysql_dados';

    // NOME EXATO DA TABELA CONFORME O SQL
    protected $table = 'estabelecimentos_geral';

    // CHAVE PRIMARIA COMPOSTA CONFORME SQL (UF, CNPJ_BASICO, CNPJ_ORDEM, CNPJ_DV)
    protected $primaryKey = ['uf', 'cnpj_basico', 'cnpj_ordem', 'cnpj_dv'];

    // DESATIVACAO DO AUTO INCREMENTO DEVIDO A CHAVE COMPOSTA
    public $incrementing = false;

    // DESATIVACAO DOS TIMESTAMPS POIS NAO EXISTEM NA TABELA
    public $timestamps = false;

    // ATRIBUTOS QUE PODEM SER PREENCHIDOS EM MASSA
    protected $fillable = [
        'cnpj_basico', 'cnpj_ordem', 'cnpj_dv', 'identificador_matriz_filial',
        'nome_fantasia', 'situacao_cadastral', 'data_situacao_cadastral',
        'motivo_situacao_cadastral', 'nome_cidade_exterior', 'pais',
        'data_inicio_atividade', 'cnae_fiscal_principal', 'cnae_fiscal_secundaria',
        'tipo_logradouro', 'logradouro', 'numero', 'complemento', 'bairro',
        'cep', 'uf', 'municipio', 'ddd1', 'telefone1', 'ddd2', 'telefone2',
        'ddd_fax', 'fax', 'correio_eletronico', 'situacao_especial',
        'data_situacao_especial'
    ];

    // NENHUM RELACIONAMENTO DECLARADO AQUI
    // MOTIVO: NAO EXISTE NENHUMA DECLARACAO DE CONSTRAINT FOREIGN KEY PARA ESTA TABELA NO SQL
}