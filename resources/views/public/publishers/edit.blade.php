@extends('layouts.app')

@section('title', 'Edit publisher')

@section('content')
<h1>Edit publisher</h1>
<form action="/publishers/{{ $publisher->id }}" method="post" novalidate>

    @csrf
    @method('patch')

    @include('public.publishers.partials.form')

    <button type="submit" class="btn btn-primary">Save Publisher</button>
</form>
@endsection
