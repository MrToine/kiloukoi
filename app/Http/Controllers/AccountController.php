<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\RequestDestroyMail;
use App\Mail\RequestValidationMail;

use App\Models\Announce;
use App\Models\LocationRequest;
use App\Models\PrivateBox;
use App\Models\PrivateMessage;

class AccountController extends Controller
{
    public function mypage() {
        return view('user.mypage', ['user' => $this->getUser()]);
    }

    public function announces() {
        return view('user.announces', ['user' => $this->getUser()]);
    }

    public function rents() {

        $user = $this->getUser();

        $rentals = Announce::whereHas('privateBox', function ($query) use ($user) {
            $query->where('tenant_id', $user->id);
        })
        ->get();

        return view('user.rents', [
            'user' => $this->getUser(),
            'rents' => $rentals,
        ]);
    }

    public function rent_request() {
        return view('user.rents_request', ['user' => $this->getUser()]);
    }

    public function request_destroy(LocationRequest $location_request)
    {
        $location_request->delete();

        Mail::send(new RequestDestroyMail($location_request));

        return to_route('account.rents.request')->with('success', 'La demande de location pour '.$location_request->announce->title.' de '.$location_request->tenant->name.' à bien été annulée !');
    }

    public function request_validated(LocationRequest $location_request)
    {
        $location_request->update([
            'status' => 1
        ]);

        $private_box = PrivateBox::create([
            'owner_id' => $this->getUser()->id,
            'tenant_id' => $location_request->tenant->id,
            'announce_id' => $location_request->announce->id,
            'owner_view'=> 0,
            'tenant_view' => 0,
        ]);

        Mail::send(new RequestValidationMail($location_request));

        return to_route('account.rents.request')->with('success', 'La demande conçernant l\'annonce '.$location_request->announce->title.' à bien été validée ! '.$location_request->tenant->name.' est son locataire actuel. Pour convenir d\'un rendez-vous, et pouvoir correspondre plus facilement avec le locataire, une messagerie personnelle à été créer. Seul vous et le locataire du bien y avait accès.');
    }

    public function history() {
        return;
    }

}
