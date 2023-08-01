@extends('app.layouts.basico')

@section('titulo', 'Clientes')

@section('conteudo')
    <div class="conteudo-pagina" >
        <div class="titulo-pagina-2">
            <p>Clientes - Listar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right:  auto">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Visualizar</th>
                            <th>Excluir</th>
                            <th>Atualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome }}</td>
                            <td><a href="{{ route('cliente.show', ['cliente' => $cliente->id ]) }}">Visualizar</a></td>
                            <td>
                                <form id="form_{{ $cliente->id }}" method="POST" action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}">
                                    @method('delete')
                                    @csrf
                                    <!--<button type="submit">Excluir</button>-->
                                    <a href="#" onclick="document.getElementById('form_{{ $cliente->id }}').submit()">Excluir</a>
                                </form>
                            </td>
                            <td><a href="{{ route('cliente.edit', ['cliente' => $cliente->id ]) }}">Editar</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $clientes->appends($request)->links() }}
                <!--
                <br>
                {{ $clientes->count() }} - Total de registros por página
                <br>
                {{ $clientes->total() }} - Total de registros da consulta
                <br>
                {{ $clientes->firstItem() }} - Número do primeiro registro da página
                <br>
                {{ $clientes->lastItem() }} - Ultimo registro da página
                -->
                <br>
                Exibindo {{ $clientes->count() }} Clientes de {{ $clientes->total() }} (de {{ $clientes->firstItem() }} á {{ $clientes->lastItem() }})
            </div>
        </div>
    </div>
@endsection
