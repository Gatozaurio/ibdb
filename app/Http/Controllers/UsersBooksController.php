<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersBooksController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index($slug)
	{
		$user = User::where('slug', $slug)->firstOrFail();
		$books = $user->books()->paginate(10);
		return view('public.userbooks.index',[
			'user' => $user,
			'books' => $books
		]);
	}
}
