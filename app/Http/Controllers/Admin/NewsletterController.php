<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Newsletter;
use App\Models\UserNewsletter;
use App\Mail\NewsletterMail;

use App\Http\Requests\Admin\NewsletterFormRequest;

class NewsletterController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.newsletter.index', [
            'newsletters' => Newsletter::paginate(25),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $newsletter = new Newsletter();

        return view('admin.newsletter.form', [
            'newsletter' => new Newsletter(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsletterFormRequest $request)
    {
        $newsletter = Newsletter::create($request->validated());
        return to_route('admin.newsletter.create')->with('success', 'La newsletter à bien été créer !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Newsletter $newsletter)
    {
        return view('admin.newsletter.form', [
            'newsletter' => $newsletter
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsletterFormRequest $request, Newsletter $newsletter)
    {
        $newsletter->update($request->validated());
        return to_route('admin.newsletter.index')->with('success', 'La newsletter à bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();
        return to_route('admin.newsletter.index')->with('success', 'La newsletter à bien été supprimer !');
    }

    public function send($newsletter) {
        $newsletter = Newsletter::findOrFail($newsletter);
        $mails = UserNewsletter::all();

        foreach ($mails as $mail) {
            Mail::send(new NewsletterMail($newsletter, $mail->user->email));
        }
        return to_route('admin.newsletter.index')->with('success', 'La newsletter à bien été envoyée !');
    }

    public function send_test($newsletter) {
        $newsletter = Newsletter::findOrFail($newsletter);

        Mail::send(new NewsletterMail($newsletter, "anthony.violet@outlook.be"));

        return to_route('admin.newsletter.index')->with('success', 'La newsletter à bien été envoyée !');
    }
}
