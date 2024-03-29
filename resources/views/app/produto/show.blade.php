@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina" >
        <div class="titulo-pagina-2">
            <p>Visualizar - Produto</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informaacao-pagina">

            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <table border="1" style="text-align: left">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $produto->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td>{{ $produto->nome }}</td>
                    </tr>
                    <tr>
                        <td>descrição:</td>
                        <td>{{ $produto->descricao }}</td>
                    </tr>
                    <tr>
                        <td>Peso:</td>
                        <td>{{ $produto->peso }} kg</td>
                    </tr>
                    <tr>
                        <td>Unidade:</td>
                        <td>{{ $produto->unidade_id }}</td>
                    </tr>
                    <tr>
                        <td>Preço:</td>
                        <td>{{ $produto->preco_venda }}</td>
                    </tr>
                    <tr>
                        <td>Estoque mínimo:</td>
                        <td>{{ $produto->estoque_minimo }}</td>
                    </tr>
                    <tr>
                        <td>Estoque Máximo:</td>
                        <td>{{ $produto->estoque_maximo }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
