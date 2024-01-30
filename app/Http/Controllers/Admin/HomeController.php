<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;

use App\Models\Page;
use App\Models\Category;
use App\Models\Option;
use App\Models\Announce;
use App\Models\User;
use App\Models\LocationRequest;
use App\Models\PrivateBox;
use App\Models\PrivateMessage;


class HomeController extends AdminController
{
    public function index() {

        $summaries = [
            [
                'title' => 'pages',
                'total' => Page::count(),
                'route' => 'admin.page',
            ],
            [
                'title' => 'annonces',
                'total' => Announce::count(),
                'route' => 'admin.announce',
            ],
            [
                'title' => 'utilisateurs',
                'total' => User::count(),
                'route' => 'admin.user',
            ],
            [
                'title' => 'catégories',
                'total' => Category::count(),
                'route' => 'admin.category',
            ],
            [
                'title' => 'option',
                'total' => Option::count(),
                'route' => 'admin.option',
            ],
        ];

        return view('admin.home', [
            'summaries' => $summaries,
        ]);
    }
}
