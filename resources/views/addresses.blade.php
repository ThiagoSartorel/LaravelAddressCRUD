@extends('master')

@section('content')

<a href="{{ route('addresses.create') }}">Create</a>

<h2>Address</h2>

<ul>
    @foreach ($addresses as $address) 
        <li>{{ $address->street }} | <a href="{{ route('addresses.edit', ['address' => $address->id]) }}">Edit</a> | <a href="{{ route('addresses.show', ['address' => $address->id]) }}">Show</a></li>
    @endforeach
</ul>

@endsection