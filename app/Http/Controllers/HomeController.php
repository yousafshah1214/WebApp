<?php

namespace App\Http\Controllers;

use App\Content;
use App\Http\Requests;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainPost = Content::active()->mainPost()->first();
        return view('home',compact('mainPost'));
    }
}
