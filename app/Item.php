<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'preco_venda', 'estoque_minimo', 'estoque_maximo', 'fornecedor_id'];
    // metodo hasOne para obter produtodetalhe
    public function ItemDetalhe()
    {
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');
    }

    public function fornecedor()
    {
        return $this->belongsTo('App\Fornecedor');
    }

    public function pedidos()
    {
        return $this->belongsToMany('App\Pedido', 'pedidos_produtos', 'produto_id', 'pedido_id');
    }
}
