<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LocationRequest;
use App\Models\Announce;
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
        $query = Announce::query()->orderBy('id', 'desc')->with('options');
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
            'announces' => Announce::orderBy('created_at', 'desc')->where('availability', '=', 1)->paginate(12),
            'input' => $request->validated()
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
        $announce = auth()->user()->announces()->create($request->validated());
        $announce->options()->sync($request->validated('options'));
        $announce->categories()->sync($request->validated('categories'));
        return to_route('announce.index')->with('success', 'L\'annonce à bien été créer !');
    }
}
