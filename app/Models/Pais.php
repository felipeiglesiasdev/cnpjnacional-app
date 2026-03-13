<?php

// NAMESPACE DO MODEL
namespace App\Models;

// IMPORTACAO DA CLASSE ELOQUENT MODEL
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// DECLARACAO DA CLASSE PAIS
class Pais extends Model
{
    // DEFINICAO DA CONEXAO ESPECIFICA SOLICITADA
    protected $connection = 'mysql_dados';

    // NOME EXATO DA TABELA CONFORME O SQL
    protected $table = 'paises';

    // DEFINICAO DA CHAVE PRIMARIA (CODIGO)
    protected $primaryKey = 'codigo';

    // DESATIVACAO DO AUTO INCREMENTO POIS O SQL NAO POSSUI AUTO_INCREMENT
    public $incrementing = false;

    // DESATIVACAO DOS TIMESTAMPS POIS NAO EXISTEM NA TABELA
    public $timestamps = false;

    // ATRIBUTOS QUE PODEM SER PREENCHIDOS EM MASSA
    protected $fillable = [
        'codigo',
        'descricao'
    ];

    // RELACIONAMENTO INVERSO BASEADO NA CONSTRAINT: fk_socios_pais
    public function socios(): HasMany
    {
        // POSSUI MUITOS SOCIOS VINCULADOS A ESTE PAIS
        return $this->hasMany(Socio::class, 'pais', 'codigo');
    }
}