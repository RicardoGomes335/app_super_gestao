<h3>Fornecedor</h3>
{{-- Aqui fica o Comentário que será descartado pelo interpretador do Blade --}}

@php
    /*
    if( !<condiicao>){} // Enquanto executa condição se for TRUE
    */
@endphp
{{-- @unless executa se a condição for FALSE --}}
Fornecedor: {{ $fornecedores[0]['nome'] }}
<br>
Status: {{ $fornecedores[0]['status'] }}
<br>
<hr>

@isset($fornecedores)

    {{-- COMANDO FORELSE / LOOP--}}
    @forelse ($fornecedores as $indice => $fornecedor)
        Iteração atual: {{ $loop->iteration }}
        <br>
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? ''}}
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? ''}}) {{ $fornecedor['telefone'] ?? ''}}
        <br>
        @if ($loop->first)
            Primeira Iteração do loop
            <br>
            Total de registros: {{ $loop->count}}
        @endif

        @if ($loop->last)
            Ultima Iteração do loop
        @endif
        <hr>
    @empty
        Não exixtem fornecedores cadastrados!
    @endforelse

    {{-- COMANDO FOREACH
    @foreach ($fornecedores as $indice => $fornecedor)
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? ''}}
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? ''}}) {{ $fornecedor['telefone'] ?? ''}}
        <hr>
    @endforeach
    --}}

    {{-- COMANDO WHILE
    @php $i = 0 @endphp
    @while (isset($fornecedores[$i]))
        Fornecedor: {{ $fornecedores[$i]['nome'] }}
        <br>
        Status: {{ $fornecedores[$i]['status'] }}
        <br>
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? ''}}
        <br>
        Telefone: ({{ $fornecedores[$i]['ddd'] ?? ''}}) {{ $fornecedores[$i]['telefone'] ?? ''}}
        <hr>
        @php $i++ @endphp
    @endwhile
    --}}

    {{-- COMANDO FOR
    @for($i = 0; isset($fornecedores[$i]); $i++)
        Fornecedor: {{ $fornecedores[$i]['nome'] }}
        <br>
        Status: {{ $fornecedores[$i]['status'] }}
        <br>
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? ''}}
        <br>
        Telefone: ({{ $fornecedores[$i]['ddd'] ?? ''}}) {{ $fornecedores[$i]['telefone'] ?? ''}}
        <hr>
    @endfor
    --}}

    {{-- SWITCH CASE
    @switch($fornecedores[2]['ddd'])
        @case('11')
            São Paulo - SP
        @break
        @case('32')
            Minas Gerais - MG
        @break
        @case('85')
            Fortaleza - CE
        @break
        @default
            Estado não identificado
    @endswitch
    --}}
@endisset













