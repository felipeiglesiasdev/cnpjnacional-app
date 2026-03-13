<?php

// NAMESPACE DO MODEL
namespace App\Models;

// IMPORTACAO DA CLASSE ELOQUENT MODEL
use Illuminate\Database\Eloquent\Model;

// DECLARACAO DA CLASSE MUNICIPIO
class Municipio extends Model
{
    // DEFINICAO DA CONEXAO ESPECIFICA SOLICITADA
    protected $connection = 'mysql_dados';

    // NOME EXATO DA TABELA CONFORME O SQL
    protected $table = 'municipios';

    // DEFINICAO DA CHAVE PRIMARIA (CODIGO)
    protected $primaryKey = 'codigo';

    // DESATIVACAO DO AUTO INCREMENTO POIS O SQL NAO POSSUI AUTO_INCREMENT AQUI
    public $incrementing = false;

    // DESATIVACAO DOS TIMESTAMPS POIS NAO EXISTEM NA TABELA
    public $timestamps = false;

    // ATRIBUTOS QUE PODEM SER PREENCHIDOS EM MASSA
    protected $fillable = [
        'codigo',
        'descricao'
    ];
}