<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Obrolan;

class ChatController extends Controller
{
    public function index() {
        $messages = Obrolan::with(['reactions','attachments'])->orderBy('created_at','asc')->get();
        return view('warga.chat',compact('messages'));
    }
}
