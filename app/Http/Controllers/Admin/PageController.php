<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Http\Requests\Admin\PageFormRequest;

use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.index', [
            'pages' => Page::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

        /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.pages.form', [
            'page' => new Page(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageFormRequest $request)
    {
        $validatedData = $request->validated();

        $page = Page::create([
            'slug' => Str::slug($validatedData['title']),
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
        ]);

        return to_route('admin.page.index')->with('success', 'La page | '.$page->title.' | à bien été créer !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('admin.pages.form', [
            'page' => $page,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageFormRequest $request, Page $page)
    {
        $validatedData = $request->validated();
        $validatedData['title'] = strtolower($validatedData['title']);

        $page->update($validatedData);
        return to_route('admin.page.index')->with('success', 'L\'annonce à bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return to_route('admin.page.index')->with('success', 'L\'annonce à bien été supprimer !');
    }
}
