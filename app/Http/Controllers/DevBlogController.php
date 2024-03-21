<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Maj;

class DevBlogController extends Controller
{
    public function majsList(){

        $majs = Maj::orderby('created_at', 'desc')->get();

        return view('devblog.majs-list', ['majs' => $majs]);
    }
}
