<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\DetailChat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JawabAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $status = $request->status;

        $query = DB::table(DB::raw('(
                    SELECT 
                        chats.sender_id,
                        users.name,
                        detail_chats.message AS latest_message,
                        chats.status,
                        chats.created_at,
                        users.foto,
                        ROW_NUMBER() OVER (PARTITION BY chats.sender_id ORDER BY detail_chats.id DESC) AS row_num
                    FROM 
                        chats 
                    LEFT JOIN 
                        detail_chats ON chats.id = detail_chats.chat_id
                    LEFT JOIN 
                        users ON users.id = chats.sender_id
                    LEFT JOIN
                        biodatas ON biodatas.user_id = users.id 
                    WHERE 
                        users.id != 1
                ) AS ranked_messages'))
                ->where('row_num', 1)
                ->when(!is_null($search), function ($query) use ($search) {
                    return $query->where('name', 'like', '%' . $search . '%');
                })
                ->when(isset($status), function ($query) use ($status) {
                    return $query->where('status', '=', $status);
                })
                ->select('sender_id', 'name', 'latest_message', 'status','created_at','foto')
                ->get();

        $data = [];
        foreach ($query as $querys) {
            $status_count = Chat::where('sender_id', $querys->sender_id)->where('status', 0)->count();
            $lates_chat = DetailChat::select('message', 'detail_chats.created_at')
            ->leftJoin('chats', 'detail_chats.chat_id', '=', 'chats.id')
            ->where('chats.sender_id',$querys->sender_id)
            ->orWhere('chats.receiver_id',$querys->sender_id)
            ->orderBy('detail_chats.id', 'desc')
            ->limit(1)
            ->first();

            $data[] = [
                'sender_id' => $querys->sender_id,
                'name' => $querys->name,
                'latest_message' => $lates_chat->message,
                'status' => $querys->status,
                'created_at' => Carbon::parse($lates_chat->created_at)->format('l,d-m-Y H:i:s '),
                'status_count' => $status_count,
                'foto' => $querys->foto ?? 'admin/images/faces/face2.jpg'
            ];
        }
       
        // dd($data);
        return view('JawabAdmin', compact('data'));
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
        $senderId = auth()->user()->id;
        $receiverId = $request->receiver_id;
        $status = 0;
        $message = $request->message;

        $chatId = chat::create([
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'status' => $status,
        ]);
        DetailChat::create([
            'chat_id'=>$chatId->id,
            'message' => $message
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $search = $request->search;
        $status = $request->status;
        Chat::where('sender_id', $id)->update(['status' => 1]);
        $dataNama = DB::table('users')->where('users.id', $id)
        ->leftJoin('biodatas', 'users.id', '=', 'biodatas.user_id')
        ->first();
       
        $queryDetail = chat::leftJoin('detail_chats', 'chats.id', '=', 'detail_chats.chat_id')
        ->leftJoin('users', 'chats.sender_id', '=', 'users.id')
        ->leftJoin('biodatas', 'users.id', '=', 'biodatas.user_id')
        ->select('chats.id', 'chats.sender_id', 'chats.receiver_id', 'chats.status', 'detail_chats.message','detail_chats.created_at','users.foto')
        ->where('chats.receiver_id', $id)
        ->orWhere('chats.sender_id', $id)
        ->orderBy('id', 'ASC')
        ->get();
    
        $query = DB::table(DB::raw('(
            SELECT 
                chats.sender_id,
                users.name,
                detail_chats.message AS latest_message,
                chats.status,
                chats.created_at,
                users.foto,
                ROW_NUMBER() OVER (PARTITION BY chats.sender_id ORDER BY detail_chats.id DESC) AS row_num
            FROM 
                chats 
            LEFT JOIN 
                detail_chats ON chats.id = detail_chats.chat_id
            LEFT JOIN 
                users ON users.id = chats.sender_id
            LEFT JOIN
                biodatas ON biodatas.user_id = users.id
            WHERE 
                users.id != 1
            ) AS ranked_messages'))
            ->where('row_num', 1)
            ->when(!is_null($search), function ($query) use ($search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->when(isset($status), function ($query) use ($status) {
                return $query->where('status', '=', $status);
            })
            ->select('sender_id', 'name', 'latest_message', 'status','created_at','foto')
            ->get();
        // dd($query);
        $data = [];
        $dataDetail = [];
        
        foreach ($query as $querys) {
            $status_count = Chat::where('sender_id', $querys->sender_id)->where('status', 0)->count();
            
            $lates_chat = DetailChat::select('message', 'detail_chats.created_at')
            ->leftJoin('chats', 'detail_chats.chat_id', '=', 'chats.id')
            ->where('chats.sender_id',$querys->sender_id)
            ->orWhere('chats.receiver_id',$querys->sender_id)
            ->orderBy('detail_chats.id', 'desc')
            ->limit(1)
            ->first();

            $data[] = [
                'sender_id' => $querys->sender_id,
                'name' => $querys->name,
                'latest_message' => $lates_chat->message,
                'status' => $querys->status,
                'created_at' => Carbon::parse($lates_chat->created_at)->format('l,d-m-Y H:i:s '),
                'status_count' => $status_count,
                'foto' => $querys->foto ?? 'admin/images/faces/face2.jpg'
            ];
        }
        foreach ($queryDetail as $queryDetails) {
            $dataDetail[] = [
                'id' => $queryDetails->id,
                'sender_id' => $queryDetails->sender_id,
                'receiver_id' => $queryDetails->receiver_id,
                'status' => $queryDetails->status,
                'message' => $queryDetails->message,
                'created_at' => Carbon::parse($queryDetails->created_at)->format('l,d-m-Y H:i:s '),
                'dataParam'=>$id,
                'foto' => $queryDetails->foto ?? 'admin/images/faces/face2.jpg',

            ];
        }
        return view('JawabAdminDetail', compact('data', 'dataDetail','dataNama'));
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
