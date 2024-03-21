<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserNewsletter;
use App\Models\VisitorNewsletter;
use App\Http\Requests\NewsletterRequest;

class NewsletterController extends Controller
{
    public function follow(NewsletterRequest $request) {
        VisitorNewsletter::firstOrCreate($request->validated());
        return redirect()->back()->with('success-newsletter', 'Inscription à la newsletter confirmée !');;
    }

    public function unfollow($mail) {
        return view('newsletter.unfollow', ['mail' => $mail]);
    }

    public function dounfollow($mail) {
        $user_mail = User::where('email', $mail)->first();
        if($visitor = VisitorNewsletter::where('email', $mail)->first()) {
            $visitor->delete();
        }elseif($user_newsletter = UserNewsletter::where('user_id', $user_mail->id)->first()) {
            $user_newsletter->delete();
        }   

        return view('newsletter.unfollow_success');
    }
}
