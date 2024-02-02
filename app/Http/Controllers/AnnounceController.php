<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LocationRequest;
use App\Models\Announce;
use App\Models\Picture;
use App\Models\Review;
use App\Models\Category;
use App\Models\Option;

use App\Http\Requests\Admin\AnnounceFormRequest;
use App\Http\Requests\SearchAnnounceRequest;
use App\Http\Requests\ContactAnnounceRequest;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactAnnounceMail;

class AnnounceController extends Controller
{
    public function index(SearchAnnounceRequest $request) {
        $query = Announce::query()->with('pictures')->orderBy('id', 'desc')->with('options')->where('check_moderation', true)->where('availability', true);
        if($price = $request->validated('price')) {
            $query = $query->where('price', '<=', $price);
        }
        if($city = $request->validated('city')) {
            $query = $query->where('city', 'like', "%{$city}%");
        }
        if($title = $request->validated('title')) {
            $query = $query->where('title', 'like', "%{$title}%");
        }

        return view('announces.index', [
            'announces' => $query->paginate(16),
            'input' => $request->validated(),
        ]);
    }

    public function show(string $slug, Announce $announce) {
        $expected_slug = $announce->getSlug();
        if($slug != $expected_slug) {
            return to_route('announce.show', ['slug' => $expected_slug, 'announce' => $announce]);
        }

        return view('announces.show', [
            'announce' => $announce
        ]);
    }

    public function contact(Announce $announce, ContactAnnounceRequest $request) {
        Mail::send(new ContactAnnounceMail($announce, $request->validated()));

        LocationRequest::create([
            'user_id' => $announce->user_id,
            'announce_id' => $announce->id,
            'tenant_id' => $this->getUser()->id,
            'status' => 0
        ]);

        return back()->with('success', 'Demande de location envoyée avec succès !');
    }

    // User only
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $announce = new Announce();

        return view('announces.form', [
            'announce' => new Announce(),
            'categories' => Category::pluck('name', 'id'),
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnounceFormRequest $request)
    {
        $validation= $request->validated();
        $validation['check_moderation'] = 0;
        $announce = auth()->user()->announces()->create($validation);
        $announce->options()->sync($validation['options']);
        $announce->categories()->sync($validation['categories']);
        $announce->attachFiles($request->validated('pictures'));
        return to_route('announce.index')->with('success', 'L\'annonce à bien été créer mais elle dois être validée par un modérateur. La décision vous sera envoyée par mail dans les plus bref délai. Restez à l\'affût !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announce $announce)
    {
        if ($announce->user_id == $this->getUser()->id) {
            return view('announces.form', [
                'announce' => $announce,
                'categories' => Category::pluck('name', 'id'),
                'options' => Option::pluck('name', 'id'),
            ]);
        }

        return to_route('website.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnounceFormRequest $request, Announce $announce)
    {
        if($announce->user_id == $this->getUser()->id) {
            $announce->update($request->validated());
            $announce->options()->sync($request->validated('options'));
            $announce->categories()->sync($request->validated('categories'));
            $announce->attachFiles($request->validated('pictures'));
            return to_route('account.rents.list')->with('success', 'L\'annonce à bien été modifié !');
        }

        return to_route('website.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announce $announce)
    {
        $privateBox = $announce->privateBox;

        if ($privateBox) {
            if( $privateBox->messages()) {
                $privateBox->messages()->delete();
            }
            $privateBox->delete();
        }

        $announce->categories()->detach();
        $announce->options()->detach();
        Picture::destroy($announce->pictures->pluck('id'));

        $announce->delete();
        return to_route('account.rents.list')->with('success', 'L\'annonce à bien été supprimer !');
    }
}
