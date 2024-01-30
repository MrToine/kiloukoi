<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Page;

class PageController extends Controller
{
    public function index($slug){

        $page = Page::where('slug', $slug)->firstOrFail();

        return view('pages.show', ['page' => $page]);
    }
}
