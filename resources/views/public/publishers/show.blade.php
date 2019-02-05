@extends('layouts.app')

@section('title', 'Publisher Info')

@section('content')
    <h2>{{ $publisher->name }}</h2>
    <h4>{{ $publisher->address }}</h4>
    <h4>{{ $publisher->web }}</h4>
	<h4>{{ $publisher->email }}</h4>
	@auth
	<form action="/publishers/{{ $publisher->id }}" method="post" class="mr-2 float-right">
		@csrf
		@method('delete')
		<button type="submit" class="btn btn-danger btn-sm">Delete Publisher</button>
	</form>
	<a href="/publishers/{{ $publisher->id }}/edit" class="btn btn-warning btn-sm mr-2     float-right">Edit</a>
	@endauth
@endsection
