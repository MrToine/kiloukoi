<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserNewsletter;

class NewsletterController extends Controller
{
    public function unfollow($mail) {
        return view('newsletter.unfollow', ['mail' => $mail]);
    }

    public function dounfollow($mail) {
        $user_mail = User::where('email', $mail)->first();
        if($user_newsletter = UserNewsletter::where('user_id', $user_mail->id)->first()) {
            $user_newsletter->delete();
        }

        return view('newsletter.unfollow_success');
    }
}
