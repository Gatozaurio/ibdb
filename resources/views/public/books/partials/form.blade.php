<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control {{ $errors->has('title')?"is-invalid":"" }}" id="title" name="title" placeholder="Introduce the book title" value="{{ isset($book)?$book->title:old('title') }}" required>
    @if( $errors->has('title'))
    <div class="invalid-feedback">
        {{ $errors->first('title') }}
    </div>
    @endif
</div>

<div class="form-group">
    <label for="author">Author</label>
    <input type="text" class="form-control {{ $errors->has('author')?"is-invalid":"" }}" id="author" name="author" placeholder="Introduce the book author" value="{{ isset($book)?$book->author:old('author') }}"required>
    @if( $errors->has('author'))
    <div class="invalid-feedback">
        {{ $errors->first('author') }}
    </div>
    @endif
</div>

<div class="form-group">
	<label for="publisher">Publisher</label>
	<select class="form-control" id="publisher" name="publisher">
		@foreach($publishers as $publisher)
			<option value="{{ $publisher->id }}"
			@if( ! $errors->isEmpty() )
				{{-- Aquí se entra cuando hay errores de validación --}}
				{{ old('publisher')==$publisher->id?"selected":"" }}
			@elseif( isset($book) )
				{{-- Aquí se entra cuando carga el formulario de edición del libro --}}
				{{ $publisher->id==$book->publisher_id?"selected":"" }}
			@endif
			>{{ $publisher->name}}</option>
		@endforeach
	</select>
	<a href="/publishers/create" target="_blank">Create publisher</a>
	@if( $errors->has('publisher') )
    <div class="invalid-feedback">
        {{ $errors->first('publisher') }}
    </div>
    @endif
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control {{ $errors->has('description')?"is-invalid":"" }}" id="description" name="description" rows="10" placeholder="Book Description" required>{{ isset($book)?$book->description:old('description') }}</textarea>
    @if( $errors->has('description'))
    <div class="invalid-feedback">
        {{ $errors->first('description') }}
    </div>
    @endif
</div>
