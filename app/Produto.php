<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'preco_venda', 'estoque_minimo', 'estoque_maximo'];
    // metodo hasOne para obter produtodetalhe
    public function ProdutoDetalhe()
    {
        return $this->hasOne('App\ProdutoDetalhe');
    }
}
