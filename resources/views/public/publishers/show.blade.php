@extends('layouts.app')

@section('title', 'Publisher Info')

@section('content')
    <h2>{{ $publisher->name }}</h2>
    <h4>{{ $publisher->address }}</h4>
    <h4>{{ $publisher->web }}</h4>
	<h4>{{ $publisher->email }}</h4>
@endsection
