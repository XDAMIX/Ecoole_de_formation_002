<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{

    public function index() {
        // $ListeMessages = Message::all();
        $ListeMessages = Message::orderBy('id', 'desc')->get();

        return view('admin.messages.index',['messages'=>$ListeMessages]);
    }

    public function show($id) {
        $Message = Message::find($id);
        return view('admin.messages.voir',['message' => $Message]);
    }

    public function destroy($id) {
        $Message = Message::find($id);
        $Message->delete();     
        return redirect('/admin/messages');
    }
}
