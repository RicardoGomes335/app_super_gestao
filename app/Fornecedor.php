<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    //
    use SoftDeletes;

    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];
}
/*
======== INSERINDO DADOS NO BANCO 1 =============
 php artisan tinker
 $f2 = new \App\Fornecedores();
>>>$f2->fornecedor = 'Fornecedorxyz';
=> "Fornecedorxyz.com.br"
>>>$f2->uf = 'SP';
=> "SP";
>>>$f2->email = 'contato@fornecedorxyz.com.br';
=> "contato@fornecedorxyz.com.br";
>>> print_r($f2->getAttributes());
Array
(
    [nome] => Fornecedor XYZ
    [site] => fornecedorxyz.com.br
    [uf] => SP
    [email] => contato@fornecedorxyz.com.br
)
=> true
>>> $f2->save();
=> true;


======== INSERINDO DADOS NO BANCO 2 =============
 php artisan tinker
 > \App\Fornecedor::create(['nome'=>'Fornecedor ABC', 'site'=>'fornecedorabc.com.br', 'uf'=>'RJ', 'email'=>'contato@fornecedorabc.com.br']);
= App\Fornecedor {#34
    nome: "Fornecedor ABC",
    site: "fornecedorabc.com.br",
    uf: "RJ",
    email: "contato@fornecedorabc.com.br",
    updated_at: "2022-12-05 15:58:11",
    created_at: "2022-12-05 15:58:11",
    id: 7,
  }

  ======== Eloquent - Selecionando registros com all() =============
  php artisan tinker
  > use \App\Fornecedor;
  > $fornecedores = Fornecedor::all();
= Illuminate\Database\Eloquent\Collection {#3501
    all: [
      App\Fornecedor {#3502
        id: 1,
        nome: "Fornecedor 100",
        site: "fornecedor100.com.br",
        created_at: "2022-11-14 19:03:03",
        updated_at: "2022-11-14 19:03:03",
        uf: "CE",
        email: "contato@fornecedor100.com.br",
        deleted_at: null,
      },
      App\Fornecedor {#3503
        id: 2,
        nome: "Fornecedor 200",
        site: "fornecedor200.com.br",
        created_at: "2022-11-14 19:03:03",
        updated_at: "2022-11-14 19:03:03",
        uf: "RS",
        email: "contato@fornecedor200.com.br",
        deleted_at: null,
      },
      App\Fornecedor {#3504
        id: 3,
        nome: "Fornecedor 300",
        site: "fornecedor300.com.br",
        created_at: null,
        updated_at: null,
        uf: "SP",
        email: "contato@fornecedor300.com.br",
        deleted_at: null,
      },
      App\Fornecedor {#3505
        id: 4,
        nome: "Fornecedor 100",
        site: "fornecedor100.com.br",
        created_at: "2022-11-14 19:15:33",
        updated_at: "2022-11-14 19:15:33",
        uf: "CE",
        email: "contato@fornecedor100.com.br",
        deleted_at: null,
      },
      App\Fornecedor {#3506
        id: 5,
        nome: "Fornecedor 200",
        site: "fornecedor200.com.br",
        created_at: "2022-11-14 19:15:33",
        updated_at: "2022-11-14 19:15:33",
        uf: "RS",
        email: "contato@fornecedor200.com.br",
        deleted_at: null,
      },
      App\Fornecedor {#3507
        id: 6,
        nome: "Fornecedor 300",
        site: "fornecedor300.com.br",
        created_at: null,
        updated_at: null,
        uf: "SP",
        email: "contato@fornecedor300.com.br",
        deleted_at: null,
      },
      App\Fornecedor {#3508
        id: 7,
        nome: "Fornecedor ABC",
        site: "fornecedorabc.com.br",
        created_at: "2022-12-05 15:58:11",
        updated_at: "2022-12-05 15:58:11",
        uf: "RJ",
        email: "contato@fornecedorabc.com.br",
        deleted_at: null,
      },
    ],
  }
  > print_r($fornecedores->toArray());
Array
(
    [0] => Array
        (
            [id] => 1
            [nome] => Fornecedor 100
            [site] => fornecedor100.com.br
            [created_at] => 2022-11-14T19:03:03.000000Z
            [updated_at] => 2022-11-14T19:03:03.000000Z
            [uf] => CE
            [email] => contato@fornecedor100.com.br
            [deleted_at] =>
        )

    [1] => Array
        (
            [id] => 2
            [nome] => Fornecedor 200
            [site] => fornecedor200.com.br
            [created_at] => 2022-11-14T19:03:03.000000Z
            [updated_at] => 2022-11-14T19:03:03.000000Z
            [uf] => RS
            [email] => contato@fornecedor200.com.br
            [deleted_at] =>
        )

    [2] => Array
        (
            [id] => 3
            [nome] => Fornecedor 300
            [site] => fornecedor300.com.br
            [created_at] =>
            [updated_at] =>
            [uf] => SP
            [email] => contato@fornecedor300.com.br
            [deleted_at] =>
        )

    [3] => Array
        (
            [id] => 4
            [nome] => Fornecedor 100
            [site] => fornecedor100.com.br
            [created_at] => 2022-11-14T19:15:33.000000Z
            [updated_at] => 2022-11-14T19:15:33.000000Z
            [uf] => CE
            [email] => contato@fornecedor100.com.br
            [deleted_at] =>
        )

    [4] => Array
        (
            [id] => 5
            [nome] => Fornecedor 200
            [site] => fornecedor200.com.br
            [created_at] => 2022-11-14T19:15:33.000000Z
            [updated_at] => 2022-11-14T19:15:33.000000Z
            [uf] => RS
            [email] => contato@fornecedor200.com.br
            [deleted_at] =>
        )

    [5] => Array
        (
            [id] => 6
            [nome] => Fornecedor 300
            [site] => fornecedor300.com.br
            [created_at] =>
            [updated_at] =>
            [uf] => SP
            [email] => contato@fornecedor300.com.br
            [deleted_at] =>
        )

    [6] => Array
        (
            [id] => 7
            [nome] => Fornecedor ABC
            [site] => fornecedorabc.com.br
            [created_at] => 2022-12-05T15:58:11.000000Z
            [updated_at] => 2022-12-05T15:58:11.000000Z
            [uf] => RJ
            [email] => contato@fornecedorabc.com.br
            [deleted_at] =>
        )

)

foreach($fornecedores as $f) { echo $f->nome; echo ' - '; }
Fornecedor 100 - Fornecedor 200 - Fornecedor 300 - Fornecedor 100 - Fornecedor 200 - Fornecedor 300 - Fornecedor ABC -

======== Eloquent - Selecionando registros com find() =============
 php artisan tinker
  > use \App\Fornecedor;
  > $fornecedores2 = Fornecedor::find(2);
= App\Fornecedor {#3519
    id: 2,
    nome: "Fornecedor 200",
    site: "fornecedor200.com.br",
    created_at: "2022-11-14 19:03:03",
    updated_at: "2022-11-14 19:03:03",
    uf: "RS",
    email: "contato@fornecedor200.com.br",
    deleted_at: null,
  }

  > echo $fornecedores2->nome;
Fornecedor 200⏎

> $fornecedores2 = Fornecedor::find([1, 2, 3, 4]);
= Illuminate\Database\Eloquent\Collection {#3525
    all: [
      App\Fornecedor {#3526
        id: 1,
        nome: "Fornecedor 100",
        site: "fornecedor100.com.br",
        created_at: "2022-11-14 19:03:03",
        updated_at: "2022-11-14 19:03:03",
        uf: "CE",
        email: "contato@fornecedor100.com.br",
        deleted_at: null,
      },
      App\Fornecedor {#3527
        id: 2,
        nome: "Fornecedor 200",
        site: "fornecedor200.com.br",
        created_at: "2022-11-14 19:03:03",
        updated_at: "2022-11-14 19:03:03",
        uf: "RS",
        email: "contato@fornecedor200.com.br",
        deleted_at: null,
      },
      App\Fornecedor {#3528
        id: 3,
        nome: "Fornecedor 300",
        site: "fornecedor300.com.br",
        created_at: null,
        updated_at: null,
        uf: "SP",
        email: "contato@fornecedor300.com.br",
        deleted_at: null,
      },
      App\Fornecedor {#3529
        id: 4,
        nome: "Fornecedor 100",
        site: "fornecedor100.com.br",
        created_at: "2022-11-14 19:15:33",
        updated_at: "2022-11-14 19:15:33",
        uf: "CE",
        email: "contato@fornecedor100.com.br",
        deleted_at: null,
      },
    ],
  }
*/
