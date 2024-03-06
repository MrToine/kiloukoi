<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LocationRequest;
use App\Models\AnnounceRequest;
use App\Models\Picture;
use App\Models\Review;
use App\Models\Category;
use App\Models\Option;

use App\Http\Requests\Admin\AnnounceRequestFormRequest;
use App\Http\Requests\SearchRequestRequest;
use App\Http\Requests\ContactRequestRequest;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactRequestMail;
use App\Mail\AdminNewRequestMail;

class RequestController extends Controller
{
    public function index(SearchRequestRequest $request) {
        $query = AnnounceRequest::query()->orderBy('id', 'desc')->where('check_moderation', true);
        if($price = $request->validated('price')) {
            $query = $query->where('price', '<=', $price);
        }
        if($city = $request->validated('city')) {
            $query = $query->where('city', 'like', "%{$city}%");
        }
        if($title = $request->validated('title')) {
            $query = $query->where('title', 'like', "%{$title}%");
        }

        return view('requests.index', [
            'requests' => $query->paginate(16),
            'input' => $request->validated(),
        ]);
    }

    public function show(string $slug, AnnounceRequest $request) {
        $expected_slug = $request->getSlug();
        if($slug != $expected_slug) {
            return to_route('request.show', ['slug' => $expected_slug, 'request' => $request]);
        }

        return view('requests.show', [
            'request' => $request
        ]);
    }

    // User only
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $request = new Request();

        return view('requests.form', [
            'request' => new AnnounceRequest(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnounceRequestFormRequest $request)
    {
        $validation= $request->validated();
        $validation['check_moderation'] = 0;
        $request = auth()->user()->requests()->create($validation);

        Mail::send(new AdminNewRequestMail($request));

        return to_route('announce.request.index')->with('success', 'La demande à bien été créer mais elle dois être validée par un modérateur. La décision vous sera envoyée par mail dans les plus bref délai. Restez à l\'affût !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        if ($request->user_id == $this->getUser()->id) {
            return view('requests.form', [
                'request' => $request,
                'categories' => Category::pluck('name', 'id'),
                'options' => Option::pluck('name', 'id'),
            ]);
        }

        return to_route('website.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestFormRequest $request, AnnounceRequest $app_request)
    {
        if($app_request->user_id == $this->getUser()->id) {
            $app_request->update($request->validated());
            $app_request->options()->sync($request->validated('options'));
            $app_request->categories()->sync($request->validated('categories'));
            $app_request->attachFiles($request->validated('pictures'));
            return to_route('account.rents.list')->with('success', 'L\'annonce à bien été modifié !');
        }

        return to_route('website.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $privateBox = $request->privateBox;

        if ($privateBox) {
            if( $privateBox->messages()) {
                $privateBox->messages()->delete();
            }
            $privateBox->delete();
        }

        $request->categories()->detach();
        $request->options()->detach();
        Picture::destroy($request->pictures->pluck('id'));

        $request->delete();
        return to_route('account.rents.list')->with('success', 'L\'annonce à bien été supprimer !');
    }
}
