<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Announce;
use App\Models\Option;
use App\Models\Category;

use App\Http\Requests\Admin\AnnounceFormRequest;

class AnnounceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.announces.index', [
            'announces' => Announce::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $announce = new Announce();

        return view('admin.announces.form', [
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
        return to_route('admin.announce.index')->with('success', 'L\'annonce à bien été créer !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announce $announce)
    {
        return view('admin.announces.form', [
            'announce' => $announce,
            'categories' => Category::pluck('name', 'id'),
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnounceFormRequest $request, Announce $announce)
    {
        $announce->update($request->validated());
        $announce->options()->sync($request->validated('options'));
        $announce->categories()->sync($request->validated('categories'));
        return to_route('admin.announce.index')->with('success', 'L\'annonce à bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announce $announce)
    {
        $announce->delete();
        return to_route('admin.announce.index')->with('success', 'L\'annonce à bien été supprimer !');
    }
}
