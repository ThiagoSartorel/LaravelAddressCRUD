@extends('master')
 
@section('content')

<h2>Create</h2>

@if (session()->has('message'))
    {{ session()->get('message') }}
@endif

<form action="{{ route('addresses.store') }}" method="post">
    @csrf
    <input type="text" name="postal_code" placeholder="Postal code"/>
    <input type="text" name="state" placeholder="State"/>
    <input type="text" name="city" placeholder="City"/>
    <input type="text" name="street" placeholder="Street"/>
    <input type="text" name="number" placeholder="Number"/>
    <button type="submit">Create</button>
</form>



@endsection