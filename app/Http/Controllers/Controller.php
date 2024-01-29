<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\View;

use Illuminate\Routing\Controller as BaseController;

use App\Models\Category;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, DispatchesJobs;

    public function __construct()
    {
        View::share([
            'user' => auth()->user(),
            'getAnnouncesCategories' => $this->getAnnouncesCategories(),
        ]);

    }

    protected function getUser() {
        return auth()->user();
    }

    protected function getAnnouncesCategories() {
        return Category::getAll();
    }
}
