@extends('master')

@section('content')

<div class="flex justify-between items-center">
    <h2 class="font-bold text-2xl">Lista de endereços</h2>
    <form action="{{ route('addresses.search') }}" method="post" class="flex">
        @csrf
        <input type="text" name="search_query" class="text-black border rounded px-2 py-1" placeholder="Digite o CEP para buscar">
        <button type="submit" class="btn-primary ml-1">Buscar</button>
    </form>
    <a href="{{ route('addresses.create') }}" class="btn-secondary">Novo Endereço</a>
</div>

<hr class="my-4"/>

<div>
    <p>{{$msg}}</p>
</div>

@if($address)
<div class="grid grid-cols-4 gap-4 overflow-auto my-4">
    <div class="rounded-md bg-gray-300 hover:bg-gray-400 text-black p-2">
        <p>{{ $address->postal_code }}</p>
        <p>{{ $address->state }} - {{ $address->city }}</p>
        <p>{{ $address->street }} - nº{{ $address->number }}</p>
        <div class="text-end">
            <a href="{{ route('addresses.edit', ['address' => $address->id]) }}">Edit</a>
            <a href="{{ route('addresses.show', ['address' => $address->id]) }}">Show</a>
        </div>
    </div>
</div>
<div class="flex flex-col"><p class="pl-2 font-semibold bg-gray-700 rounded-t-md txt-center w-full border-b mb-2">Outros Resultados</p></div>

@endif
<div class="grid grid-cols-4 gap-4 overflow-auto">

@foreach ($addresses as $address) 
    <div class="rounded-md bg-gray-300 hover:bg-gray-400 text-black p-2">
        <p>{{ $address->postal_code }}</p>
        <p>{{ $address->state }} - {{ $address->city }}</p>
        <p>{{ $address->street }} - nº{{ $address->number }}</p>
        <div class="text-end">
            <a href="{{ route('addresses.edit', ['address' => $address->id]) }}">Edit</a>
            <a href="{{ route('addresses.show', ['address' => $address->id]) }}">Show</a>
        </div>
    </div>
@endforeach

</div>


@endsection
