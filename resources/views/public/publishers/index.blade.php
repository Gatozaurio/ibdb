@extends('layouts.app')

@section('title', 'Publishers list')

@section('content')
<h1>Publishers list</h1>

<div class="row">
  @forelse ($publishers as $publisher)

  <div class="card mr-4 mt-4" style="width: 18rem;">
   <div class="card-body">
     <h5 class="card-title">{{ $publisher['name'] }}</h5>
     <h6 class="card-subtitle mb-2 text-muted">{{ $publisher['web'] }}</h6>
     <p class="card-text">{{ $publisher['email'] }}</p>
     <div class='btn-group'>
     <a href="/publishers/{{ $publisher['slug'] }}" class="btn btn-primary border border-primary rounded mr-1">More</a>
     <a href="/publishers/{{ $publisher['id'] }}/edit" class="btn btn-primary border border-primary rounded mx-1">Edit</a>

     <form action="/publishers/{{ $publisher['id'] }}" method="post">
      @csrf
      @method('delete')
      <button type="submit" class="btn btn-danger ml-5">Delete</a>
     </form>
    </div>
   </div>
  </div>
  @empty
    <p>There aren't publishers available</p>
  @endforelse
</div>


<div class="d-flex justify-content-center mt-4">
	{{ $publishers->links() }}
</div>

@endsection
