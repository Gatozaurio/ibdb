@extends('layouts.app')

@section('title', 'New book')

@section('content')
<h1>Add new book</h1>
<form action="/books" method="post" novalidate>

    @csrf

    @include('public.books.partials.form')

    <button type="submit" class="btn btn-primary">Save Book</button>
</form>
@endsection
