@extends('master')

@section('content')

<div class="flex flex-col items-center w-1/2 mx-auto my-8">
    <h2 class="text-3xl font-bold mb-4">Desafio - DESENVOLVEDOR FULL STACK JR/PL</h2>
    
    <!-- Formulário de busca -->
    <form action="{{ route('addresses.search') }}" method="post" class="mb-4">
        @csrf
        <input type="text" name="search_query" class="border rounded px-2 py-1" placeholder="Digite o CEP para buscar">
        <button type="submit" class="btn-primary ml-2">Buscar</button>
    </form>
    
    <!-- Exibir resultados da busca -->
    @if (count($addresses) > 0)
        <ul class="list-disc list-inside">
            @foreach ($addresses as $address)
                <li>{{ $address->street }}, {{ $address->number }}, {{ $address->city }}, {{ $address->state }}</li>
            @endforeach
        </ul>
    @else
        <p>Nenhum endereço encontrado.</p>
    @endif

</div>

@endsection
