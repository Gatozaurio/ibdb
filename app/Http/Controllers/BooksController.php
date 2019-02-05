<?php

namespace App\Http\Controllers;

use App\Book;
use App\Publisher;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

class BooksController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', [
			'only' => ['create', 'store', 'edit', 'update', 'destroy']
		]
	);
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(10);

        return view('public.books.index')->withBooks($books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$publishers = Publisher::all();

        return view('public.books.create', ['publishers' => $publishers]);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        Book::create([
			'user_id' =>  $request->user()->id,
			'publisher_id' =>  request('publisher'),
            'title' => request('title'),
            'slug' => str_slug(request('title'), "-"),
            'author' => request('author'),
            'description' => request('description')
        ]);



        return redirect('/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $book = Book::where('slug', $slug)->firstOrFail();

        return view('public.books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
		$publishers = Publisher::all();

        return view('public.books.edit', [
			'book' => $book,
			'publishers' => $publishers
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        $book->update([
            'title' => request('title'),
			'publisher_id' => request('publisher'),
            'slug' => str_slug(request('title'), "-"),
            'author' => request('author'),
            'description' => request('description')
        ]);

        return redirect('/books/'.$book->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/');
    }
}
