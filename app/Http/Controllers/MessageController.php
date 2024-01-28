<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PrivateBox;
use App\Models\PrivateMessage;
use App\Models\Announce;

class MessageController extends Controller
{
    public function index() {
        $ownerBoxes = $this->getUser()->ownerMessages;
        $tenantBoxes = $this->getUser()->tenantMessages;

        $privateBoxes = $ownerBoxes->union($tenantBoxes);

        return view('user.messages.index', [
            'user' => $this->getUser(),
            'private_boxes' => $privateBoxes,
        ]);
    }

    public function show(int $announce_id) {

        $announce = Announce::findOrFail($announce_id);
        $privateBox = $announce->privateBox;
        $messages = $privateBox->messages;

        return view('user.messages.show', [
            'user' => $this->getUser(),
            'private_box' => $privateBox,
            'messages' => $messages,
        ]);
    }
}
