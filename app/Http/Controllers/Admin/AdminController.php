<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\View;

use Illuminate\Routing\Controller as BaseController;

use App\Models\Announce;

class AdminController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, DispatchesJobs;

    public function __construct()
    {
        View::share([
            'countRequests' => $this->countRequests(),
        ]);

    }

    protected function countRequests() {
        return Announce::where('check_moderation', false)->count();
    }
}
