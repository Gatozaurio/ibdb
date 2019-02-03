@extends('layouts.app')

@section('title', 'New publisher')

@section('content')
<h1>Add new bublisher</h1>
<form action="/publishers" method="post" novalidate>

    @csrf

    @include('public.publishers.partials.form')

    <button type="submit" class="btn btn-primary">Save Publisher</button>
</form>
@endsection
