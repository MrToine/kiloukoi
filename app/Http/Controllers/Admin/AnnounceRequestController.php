<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\CheckModerationAnnounceRequestMail;

use App\Models\AnnounceRequest;

use App\Http\Requests\Admin\AnnounceFormRequest;

class AnnounceRequestController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.requests.index', [
            'requests' => AnnounceRequest::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnnounceRequest $announceRequest)
    {

        $announceRequest->delete();
        return to_route('admin.announce.index')->with('success', 'L\'annonce à bien été supprimer !');
    }

    public function check_moderation(AnnounceRequest $announceRequest)
    {
        $announceRequest->update(['check_moderation' => !$announceRequest->check_moderation]);

        Mail::send(new CheckModerationAnnounceRequestMail($announceRequest));

        return to_route('admin.request.index')->with('success', 'L\'annonce à bien été modérée !');
    }
}
