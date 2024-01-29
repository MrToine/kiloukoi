<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Announce;
use App\Models\Category;
use App\Models\Option;

use App\Models\User;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    public function index() {
        $announces = Announce::orderBy('created_at', 'desc')->limit(4)->get();
        return view('home', ['announces' => $announces]);
    }

    public function create_users_default() {
        $newUser = User::create([
            'name' => "Anthony",
            'email' => "anthony.violet@outlook.be",
            'password' => Hash::make('0000'),
            'registration_token' => Hash::make('0000'),
            'avatar' => 'default.jpg',
            'description' => '',
            'is_verified' => 1
        ]);
        $role = Role::findByName('admin');
        $newUser->assignRole($role);

        $newUser2 = User::create([
            'name' => "Frce04",
            'email' => "anthony.flet@gmail.com",
            'password' => Hash::make('0000'),
            'registration_token' => Hash::make('0000'),
            'avatar' => 'default.jpg',
            'description' => '',
            'is_verified' => 1
        ]);
        $role = Role::findByName('user');
        $newUser2->assignRole($role);

        return to_route('website.index')->with('error', 'Le faker a créer 2 utilisateurs. ATENTION !! Supprimer le faker dès que possible (Controllers/home->create_users_default ** routes -> faker)');
    }
}
