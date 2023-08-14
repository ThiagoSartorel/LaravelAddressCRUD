@extends('master')

@section('content')

<div class="flex flex-col items-center mx-4 md:w-1/2 md:mx-auto my-8 space-y-8">
    <h2 class="text-3xl font-bold ">Desafio DESENVOLVEDOR FULL STACK JR/PL</h2>
    <p class="text-justify text-xl">O desafio é composto por desenvolver uma API para um sistema FrontEnd de busca por CEP’S (necessário desenvolver) utilizar API Publica para buscar CEP’S que ainda não foram cadastrados na base de dados do sistema, para isso o sistema deve conter um CRUD básico de endereços e o layout ficará a critério do candidato.</p>
    <a href="{{ route('addresses.index') }}" class="w-full md:w-1/4 btn-primary text-xl">Continuar</a>
</div>

@endsection
