<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PrivateBox;
use App\Models\PrivateMessage;
use App\Models\Announce;
use App\Models\User;

use Illuminate\Support\Facades\Mail;
use App\Mail\PrivateMessageMail;

use App\Http\Requests\PrivateMessageRequest;

class MessageController extends Controller
{
    public function index() {
        $user = $this->getUser();
        $privateBoxes = PrivateBox::where(function ($query) use ($user) {
            $query->where('owner_id', $this->getUser()->id)
                ->orWhere('tenant_id', $this->getUser()->id);
        })->get();

        return view('user.messages.index', [
            'user' => $this->getUser(),
            'private_boxes' => $privateBoxes,
        ]);
    }

    public function show(int $announce_id) {

        $announce = Announce::findOrFail($announce_id);
        $privateBox = $announce->privateBox;
        $messages = $privateBox->messages;

        if($this->getUser()->id == $privateBox->owner->id) {
            $privateBox->update([
                'owner_view' => true,
            ]);
        }else{
            $privateBox->update([
                'tenant_view' => true,
            ]);
        }

        return view('user.messages.show', [
            'user' => $this->getUser(),
            'private_box' => $privateBox,
            'messages' => $messages,
        ]);
    }

    public function store(PrivateMessageRequest $request, int $box_id) {

        $private_message = PrivateMessage::create([
            'user_id' => $this->getUser()->id,
            'box_id' => $box_id,
            'message' => $request->validated('message')
        ]);

        $box = PrivateBox::findOrFail($box_id);

        if($this->getUser()->id == $box->owner->id) {
            $receiver = $box->tenant;
            $box->update([
                'tenant_view' => false,
            ]);
        }else{
            $receiver = $box->owner;
            $box->update([
                'owner_view' => false,
            ]);
        }

        $info_email = [
            'privateMessage' => $private_message,
            'announce' => $box->announce,
            'user' => $receiver,
        ];

        Mail::send(new PrivateMessageMail($info_email));

        return to_route('account.messages.show', ['announce_id' => $box->announce->id])->with('success', 'Message envoyé avec succès !');
    }
}
