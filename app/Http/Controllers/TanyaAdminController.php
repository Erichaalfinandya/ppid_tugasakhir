<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\DetailChat;
use Illuminate\Http\Request;

class TanyaAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = chat::leftJoin('detail_chats', 'chats.id', '=', 'detail_chats.chat_id')
        ->leftJoin('users', 'chats.sender_id', '=', 'users.id')
        ->leftJoin('biodatas', 'users.id', '=', 'biodatas.user_id')
        ->select('chats.id', 'chats.sender_id', 'chats.receiver_id', 'chats.status', 'detail_chats.message', 'detail_chats.created_at','users.foto')
        ->where('chats.sender_id', auth()->user()->id)
        ->orWhere('chats.receiver_id', auth()->user()->id)
        ->orderBy('chats.id', 'ASC')
        ->get();
        $data = [];
        foreach ($query as $querys) {
            $data[] = [
                'id' => $querys->id,
                'sender_id' => $querys->sender_id,
                'receiver_id' => $querys->receiver_id,
                'status' => $querys->status,
                'message' => $querys->message,
                'created_at' => $querys->created_at,
                'foto' => $querys->foto,
            ];
        }       
        return view('UserTanyaAdmin', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $receiver_id = '1';
        $sender_id = auth()->user()->id;
        $message = $request->message;
        $chat = Chat::create([
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'status' => 0
        ]);
        DetailChat::create([
            'chat_id' => $chat->id,
            'message' => $message
        ]);
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
