<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Announce;
use App\Models\Category;
use App\Models\Option;

class HomeController extends Controller
{
    public function index() {
        $announces = Announce::orderBy('created_at', 'desc')->limit(4)->get();
        return view('home', ['announces' => $announces]);
    }
}
