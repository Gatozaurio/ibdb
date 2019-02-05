@extends('layouts.app')

@section('title', 'Book Info')

@section('content')
    <h2>{{ $book->title }}</h2>
    <h4>{{ $book->author }}</h4>
    <p>{{ $book->description }}</p>

	@auth
	<form action="/books/{{ $book->id }}" method="post" class="mr-2 float-right">
		@csrf
		@method('delete')
		<button type="submit" class="btn btn-danger btn-sm">Delete Book</button>
	</form>
	<a href="/books/{{ $book->id }}/edit" class="btn btn-warning btn-sm mr-2     float-right">Edit</a>
	@endauth

@endsection
