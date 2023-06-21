<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\File;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = Content::get();
        return view('welcome')->with(compact('data'));
    }
}
