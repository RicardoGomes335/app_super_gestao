<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPedidosAddQuantidade extends Migration
{
    /**
     * Adicionar uma nova coluna ( quantidade ) na tabela ( pedidos_produtos)
     * Run the migrations.
     * 1 - php artisan make:migration alter_pedidos_add_quantidade
     * @return void
     */
    public function up()
    {
        // 2 - Cria o Schema na tabela pedidos_produtos e insere a coluna $table->integer('quantidade')
        Schema::table('pedidos_produtos', function (Blueprint $table) {
            $table->integer('quantidade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 2 - Desfaz o Schema na tabela pedidos_produtos e insere a coluna $table->integer('quantidade')
        Schema::table('pedidos_produtos', function (Blueprint $table) {
            $table->dropColumn('quantidade');
        });
    }

    // 3 - rodar o comando: php artisan migrate
}
