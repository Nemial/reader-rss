<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $parsedXml = simplexml_load_file('https://www.theregister.co.uk/software/headlines.atom');
        foreach ($parsedXml->entry as $item) {
            dd($item);
        }
        ddd();
        return view('home');
    }
}
