<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Page;
use App\Models\Category;
use App\Models\Option;
use App\Models\Announce;
use App\Models\User;
use App\Models\UserNewsletter;
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

        $fileExists = Storage::exists('public/maj_newsletter.txt');
        if ($fileExists) {
            $maj_newsletter = True;
        } else {
            $maj_newsletter = False;
        }

        return view('admin.home', [
            'summaries' => $summaries,
            'nb_userAffiliate' => UserNewsletter::count(),
            'maj_newsletter' => $maj_newsletter,
        ]);
    }

    public function newsletter_maj() {
        // Sélectionner tous les utilisateurs
        $utilisateurs = User::all();

        // Parcourir tous les utilisateurs
        foreach ($utilisateurs as $utilisateur) {
            // Vérifier si l'utilisateur n'est pas déjà inscrit à la newsletter
            if (!$utilisateur->newsletter) {
                // Si l'utilisateur n'est pas inscrit, créer une nouvelle entrée dans la table user_newsletters
                $newsletter = new UserNewsletter();
                $newsletter->user_id = $utilisateur->id;
                $newsletter->save();
            }
        }

        $fileToDelete = 'public/maj_newsletter.txt';
        Storage::delete($fileToDelete);

        return to_route('admin.home');
    }
}
