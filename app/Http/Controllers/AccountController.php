<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LocationRequest;

class AccountController extends Controller
{
    public function index() {
        return;
    }

    public function announces() {
        $user = auth()->user();

        return view('user.announces', ['user' => $user]);
    }

    public function rent_request() {
        return view('user.rents_request', ['user' => $this->getUser()]);
    }

    public function request_destroy(LocationRequest $location_request)
    {
        $location_request->delete();
        return to_route('account.rents.request')->with('success', 'La demande de location pour '.$location_request->announce->title.' de '.$location_request->tenant->name.' à bien été annulée !');
    }

    public function request_validated(LocationRequest $location_request)
    {
        $location_request->update([
            'status' => 1
        ]);

        Mail::send(new RequestValidation($location_request));

        return to_route('account.rents.request')->with('success', 'La demande conçernant l\'annonce '.$location_request->announce->title.' à bien été validée ! '.$location_request->tenant->name.' est son locataire actuel.');
    }

    public function history() {
        return;
    }

}
