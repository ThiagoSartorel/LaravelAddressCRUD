@extends('master')
 
@section('content')

<h2>Edit</h2>

@if (session()->has('message'))
    {{ session()->get('message') }}
@endif

<form action="{{ route('addresses.update', ['address' => $address->id]) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT"/>
    <input type="text" nme="postal_code" value="{{ $address->postal_code }}"/>
    <input type="text" name="state" value="{{ $address->state }}"/>
    <input type="text" nam="city" value="{{ $address->city }}"/>
    <input type="text" name="street" value="{{ $address->street }}"/>
    <input type="text" name="number" value="{{ $address->number }}"/>
    <button type="submit">Update</button>
</form>



@endsection