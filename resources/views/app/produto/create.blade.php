@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina" >
        <div class="titulo-pagina-2">
            @if(isset($produto->id))
                <p>Editar Produto</p>
            @else
                <p>Adicionar - Produto</p>
            @endif
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informaacao-pagina">

            <div style="width: 30%; margin-left: auto; margin-right: auto;">

                @if(isset($produto->id))
                <form method="POST" action="{{ route('produto.update', ['produto' => $produto->id]) }}">
                    @csrf
                    @method('PUT')
                @else
                <form method="POST" action="{{ route('produto.store') }}">
                    @csrf
                @endif
                    <input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <input type="text" name="descricao" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descrição" class="borda-preta">
                    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

                    <input type="text" name="peso" value="{{ $produto->peso ?? old('peso') }}" placeholder="Peso" class="borda-preta">
                    {{ $errors->has('peso') ? $errors->first('peso') : '' }}

                    <select name="unidade_id">
                        <option>-- Selecione a Unidade de Medida --</option>
                        @foreach ($unidades as $unidade)
                        <option value="{{ $unidade->id }}" {{ ($produto->unidade_id ?? old('inidade_id')) == $unidade->id ? 'selected' : '' }}>{{ $unidade->descricao }}</option>
                        @endforeach

                    </select>
                    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

                    <input type="text" name="preco_venda" value="{{ $produto->preco_venda ?? old('preco_venda') }}" placeholder="Preço de Venda" class="borda-preta">
                    {{ $errors->has('preco_venda') ? $errors->first('preco_venda') : '' }}

                    <input type="text" name="estoque_minimo" value="{{ $produto->estoque_minimo ?? old('estoque_minimo') }}" placeholder="Estoque minimo" class="borda-preta">
                    {{ $errors->has('estoque_minimo') ? $errors->first('estoque_minimo') : '' }}

                    <input type="text" name="estoque_maximo" value="{{ $produto->estoque_maximo ?? old('estoque_maximo') }}" placeholder="Estoque máximo" class="borda-preta">
                    {{ $errors->has('estoque_maximo') ? $errors->first('estoque_maximo') : '' }}

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
