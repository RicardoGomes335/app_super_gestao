<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Site_Contato
//site_contato
//site_contatos

class SiteContato extends Model
{
    protected $fillable = ['nome', 'telefone', 'email', 'motivo_contatos_id', 'mensagem'];
}
/*
 INSERINDO DADOS
 ============================================

 $contato = new \App\SiteContato();

 > $contato->nome = 'Jorge';
= "Jorge"

> $contato->telefone = '(11) 9842-77838';
= "(11) 9842-77838"

> $contato->email = 'contato@jorge.com.br';
= "contato@jorge.com.br"

> $contato->motivo_contatos_id = 1;
= 1

> $contato->mensagem = 'Olá, gostaria de maiores informações sobre o Super Gestão';
= "Olá, gostaria de maiores informações sobre o Super Gestão"

print_r($contato->getAttributes());

$contato->save();
*/
