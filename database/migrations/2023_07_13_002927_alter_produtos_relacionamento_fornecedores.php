<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionamentoFornecedores extends Migration
{
    /**
     * Run the migrations
     * php artisan make:migration alter_produtos_relacionamento_fornecedores
     * @return void
     */
    public function up()
    {
        //Criando a coluna na tabela Produtos ('fornecedor_id')->after('id') que vai receber a FK da tabela Fornecedores
        Schema::table('produtos', function (Blueprint $table) {
            // Insere um registro de fornecedor para estabelecer o relacionamento
            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome' => 'Fornecedor Padrão SG',
                'site' => 'www.fornecedorpedraosg.com.br',
                'uf' => 'SP',
                'email' => 'contato@fornecedorpedraosg.com.br',
            ]);

            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            //Constraint do relacionamento (A coluna fornecedores_id recebe o id da tabela Fornecedores)
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Desfazendo as alterações
        //Constraint do relacionamento (A coluna fornecedores_id recebe o id da tabela Fornecedores)
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });
    }
}
