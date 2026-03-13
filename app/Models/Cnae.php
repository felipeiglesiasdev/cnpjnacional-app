<?php

// NAMESPACE DO MODEL
namespace App\Models;

// IMPORTACAO DA CLASSE ELOQUENT MODEL
use Illuminate\Database\Eloquent\Model;

// DECLARACAO DA CLASSE CNAE
class Cnae extends Model
{
    // DEFINICAO DA CONEXAO ESPECIFICA SOLICITADA
    protected $connection = 'mysql_dados';

    // NOME EXATO DA TABELA CONFORME O SQL
    protected $table = 'cnaes';

    // DEFINICAO DA CHAVE PRIMARIA (CODIGO)
    protected $primaryKey = 'codigo';

    // DEFINICAO DO TIPO DA CHAVE PRIMARIA COMO STRING POIS E CHAR(7)
    protected $keyType = 'string';

    // DESATIVACAO DO AUTO INCREMENTO POIS A CHAVE NAO E NUMERICA
    public $incrementing = false;

    // DESATIVACAO DOS TIMESTAMPS POIS NAO EXISTEM NA TABELA
    public $timestamps = false;

    // ATRIBUTOS QUE PODEM SER PREENCHIDOS EM MASSA
    protected $fillable = [
        'codigo',
        'descricao'
    ];
}