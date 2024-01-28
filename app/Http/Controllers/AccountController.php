<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index() {
        return;
    }

    public function announces() {
        $user = auth()->user();

        return view('user.announces', ['user' => $user]);
    }

    public function rent_request() {
        return;
    }

    public function history() {
        return;
    }

}
