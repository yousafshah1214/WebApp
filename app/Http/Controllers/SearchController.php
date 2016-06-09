<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     *  Show Search Page for domain searching.
     */
    public function index(){
        return view('search');
    }
}
