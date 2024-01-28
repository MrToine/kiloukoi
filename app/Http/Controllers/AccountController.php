<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\RequestDestroyMail;
use App\Mail\RequestValidationMail;

use App\Models\LocationRequest;

class AccountController extends Controller
{
    public function index() {
        return;
    }

    public function announces() {
        return view('user.announces', ['user' => $this->getUser()]);
    }

    public function rents() {
        return view('user.rents', ['user' => $this->getUser()]);
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

        Mail::send(new RequestValidationMail($location_request));

        return to_route('account.rents.request')->with('success', 'La demande conçernant l\'annonce '.$location_request->announce->title.' à bien été validée ! '.$location_request->tenant->name.' est son locataire actuel. Pour convenir d\'un rendez-vous, et pouvoir correspondre plus facilement avec le locataire, une messagerie personnelle à été créer. Seul vous et le locataire du bien y avait accès.');
    }

    public function history() {
        return;
    }

}
