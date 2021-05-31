<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Pagination\Paginator;

class HomeController extends Controller
{
    public function index()
    {

        return view('front.index');
    }
}
