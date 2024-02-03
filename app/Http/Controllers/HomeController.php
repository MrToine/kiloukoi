<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Announce;
use App\Models\Review;
use App\Models\Category;
use App\Models\Option;

use App\Models\User;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class HomeController extends Controller
{
    public function index() {
        $announces = Announce::with('pictures')->orderBy('created_at', 'desc')->where('check_moderation', true)->where('availability', true)->limit(4)->get();
        return view('home', [
            'announces' => $announces
        ]);
    }

    public function test_email() {
        Mail::to('anthony.flet@gmail.com')->send(new TestMail);
        return to_route('website.index')->with('success', '<strong>anthony.flet@gmail.com<strong> : Email envoyé avec succès !');
    }
}
