@extends('master')
 
@section('content')

<h2>Show</h2>

<form action="{{ route('addresses.destroy', ['address' => $address->id]) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE" />
    <button type="submit">Excluir</button>
</form>

<div>
    @csrf
    <label>CEP</label>
    <p>{{$address->postal_code}}</p>
    <label>Estado</label>
    <p>{{$address->state}}</p>
    <label>Cidade</label>
    <p>{{$address->city}}</p>
    <label>Rua</label>
    <p>{{$address->street}}</p>
    <label>Número</label>
    <p>{{$address->number}}</p>
</div>

@endsection
