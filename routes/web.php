<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return 'Olá, seja bem vindo ao curso!';
});
*/

Route::get('/', 'PrincipalController@principal')->name('site.index')->middleware('log.acesso');

Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');

Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

// php artisan make:controller LoginController
Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

// Rotas do middleware
Route::middleware('autenticacao:padrao,visitante,p3,p4')->prefix('/app')->group(function () {
    // php artisan make:controller HomeController
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');

    // php artisan make:controller FornecedorController
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    // paginação
    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');
    // Excluir
    Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');

    // (Produto) php artisan make:controller --resource ProdutoController ->implementado com resource
    Route::resource('produto', 'ProdutoController');

    // (ProdutoDetalhe) php artisan make:controller --resource ProdutoDetalheController
    Route::resource('produto-detalhe', 'ProdutoDetalheController');

    // php artisan make:controller --resource ClienteController
    Route::resource('cliente', 'ClienteController');

    // php artisan make:controller --resource PedidoController
    Route::resource('pedido', 'PedidoController');

    // php artisan make:controller --resource PedidoProdutoController
    //route::resource('pedido-produto', 'PedidoProdutoController');

    Route::get('pedido-produto/create/{pedido}', 'PedidoProdutoController@create')->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}', 'PedidoProdutoController@store')->name('pedido-produto.store');
    //Route::delete('pedido-produto.destroy/{pedido}/{produto}', 'PedidoProdutoController@destroy')->name('pedido-produto.destroy');
    Route::delete('pedido-produto.destroy/{pedidoProduto}/{pedido_id}', 'PedidoProdutoController@destroy')->name('pedido-produto.destroy');
});

//

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('site.teste');

Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="' . route('site.index') . '">clique aqui</a> para ir para página inicial';
});
