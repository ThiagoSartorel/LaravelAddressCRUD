@extends('master')

@section('content')

@php
    $openModal = false;
@endphp

<div class="flex flex-col md:flex-row justify-between items-center">
    <h2 class="font-bold text-2xl">Lista de endereços</h2>
    <div class="flex flex-row mt-2 space-x-4 text-sm md:text-base just">

        <form action="{{ route('addresses.search') }}" method="post" class="flex">
            @csrf
            <input type="text" name="search_query" class="text-black border rounded px-2 py-1" placeholder="Digite o CEP para buscar">            
            <button type="submit" class="btn-primary ml-1">Buscar</button>
        </form>

        <modelCreate/>
    </div>
</div>

<hr class="my-4 mx-2"/>


@if($msg)
    <p
        class="fixed rounded-full px-4 py-1 bg-opacity-70 text-white font-semibold bg-purple-600 right-4 bottom-4"

    >
    {{$msg}}
    </p>
@endif

@if($address)
<div class="grid grid-cols sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mx-8 overflow-auto mb-4">
    <div class="rounded-md bg-gray-300 hover:bg-gray-400 text-black p-2">
        <p>{{ $address->postal_code }}</p>
        <p>{{ $address->state }} - {{ $address->city }}</p>
        <p>{{ $address->street }} - nº{{ $address->number }}</p>
        <div class="flex justify-end space-x-2">
            <form action="{{ route('addresses.destroy', ['address' => $address->id]) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="DELETE" />
                <button type="submit">Excluir</button>
            </form>
            <modeledit :address-data="{{ json_encode($address) }}"></modeledit>
        </div>
    </div>
</div>
<div class="flex flex-col"><p class="pl-2 font-semibold bg-gray-700 rounded-t-md txt-center w-full border-b mb-2">Outros Resultados</p></div>

@endif
<div class="grid grid-cols sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mx-8 overflow-auto mb-4">

@foreach ($addresses as $address) 
    <div class="rounded-md bg-gray-300 hover:bg-gray-400 text-black p-2 ">
        <p>{{ $address->postal_code }}</p>
        <p>{{ $address->state }} - {{ $address->city }}</p>
        <p>{{ $address->street }} - nº{{ $address->number }}</p>
        <div class="flex justify-end space-x-2">
        <form action="{{ route('addresses.destroy', ['address' => $address->id]) }}" method="post">
            @csrf
                <input type="hidden" name="_method" value="DELETE" />
                <button type="submit">Excluir</button>
            </form>
            <modeledit :address-data="{{ json_encode($address) }}"></modeledit>
        </div>
    </div>
@endforeach

</div>


@endsection
