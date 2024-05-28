<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Maj;
use App\Models\DevblogPost as Devblog;

class DevBlogController extends Controller
{
    public function majsList(){

        $majs = Maj::orderby('created_at', 'desc')->get();

        return view('devblog.majs-list', ['majs' => $majs]);
    }

    public function devList(){
        $posts = Devblog::orderby('created_at', 'desc')->get();

        return view('devblog.posts.list', ['posts' => $posts, 'count_posts' => Devblog::count()]);
    }

    public function show(string $slug, Devblog $post) {
        
        $post = Devblog::where('slug', $slug)->firstOrFail();

        return view('devblog.posts.show', [
            'post' => $post
        ]);
    }
}
