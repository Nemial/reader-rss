<?php

namespace App\Http\Controllers;

use App\Models\Element;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $elements = Element::all();
        $topWords = Word::orderBy('count', 'desc')->limit(10)->get();
        return view('element.index', ['elements' => $elements, 'words' => $topWords]);
    }
}
