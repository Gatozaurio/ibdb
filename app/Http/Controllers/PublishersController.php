<?php

namespace App\Http\Controllers;

use App\Publisher;
use Illuminate\Http\Request;
use App\Http\Requests\PublisherRequest;

class PublishersController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishers = Publisher::paginate(6);

        return view('public.publishers.index')->withPublishers($publishers);
    }

	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('public.publishers.create');
    }

	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublisherRequest $request)
    {
        Publisher::create([
            'name' => request('name'),
            'slug' => str_slug(request('name'), "-"),
            'address' => request('address'),
            'web' => request('web'),
			'email' => request('email')
        ]);

        return redirect('/');
    }

	    /**
	     * Display the specified resource.
	     *
	     * @param  \App\Publisher  $publisher
	     * @return \Illuminate\Http\Response
	     */
	    public function show($slug)
	    {
	        $publisher = Publisher::where('slug', $slug)->firstOrFail();

	        return view('public.publishers.show', ['publisher' => $publisher]);
	    }

		/**
	     * Show the form for editing the specified resource.
	     *
	     * @param  \App\Publisher  $publisher
	     * @return \Illuminate\Http\Response
	     */
	    public function edit(Publisher $publisher)
	    {
	        return view('public.publishers.edit', ['publisher' => $publisher]);
	    }

		/**
	     * Update the specified resource in storage.
	     *
	     * @param  \Illuminate\Http\Request  $request
	     * @param  \App\Publisher  $publisher
	     * @return \Illuminate\Http\Response
	     */
	    public function update(PublisherRequest $request, Publisher $publisher)
	    {
	        $publisher->update([
	            'name' => request('name'),
	            'slug' => str_slug(request('name'), "-"),
	            'address' => request('address'),
	            'web' => request('web'),
				'email' => request('email')
	        ]);

	        return redirect('/publishers/'.$publisher->slug);
	    }

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  \App\Publisher  $publisher
		 * @return \Illuminate\Http\Response
		 */
		public function destroy(Publisher $publisher)
		{
			$publisher->delete();

			return redirect('/');
		}
}
