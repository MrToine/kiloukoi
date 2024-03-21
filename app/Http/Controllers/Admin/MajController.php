<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\MajFormRequest;

use App\Models\Maj;

class MajController extends Controller
{
    public function index()
    {
        return view('admin.majs.index', [
            'majs' => Maj::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

        /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.majs.form', [
            'maj' => new maj(),
            'options' => ['maj', 'problème technique'],
            'value' => collect(['maj', 'problème technique']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MajFormRequest $request)
    {
        $validatedData = $request->validated();

        $maj = Maj::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'type' => $validatedData['type'],
        ]);

        return to_route('admin.maj.index')->with('success', 'La maj | '.$maj->title.' | à bien été créer !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maj $maj)
    {
        return view('admin.majs.form', [
            'maj' => $maj,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MajFormRequest $request, maj $maj)
    {
        $validatedData = $request->validated();
        $validatedData['title'] = strtolower($validatedData['title']);

        $maj->update($validatedData);
        return to_route('admin.maj.index')->with('success', 'L\'annonce à bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maj $maj)
    {
        $maj->delete();
        return to_route('admin.maj.index')->with('success', 'L\'annonce à bien été supprimer !');
    }
}
