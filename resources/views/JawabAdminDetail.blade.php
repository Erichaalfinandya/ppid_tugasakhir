@extends('layouts.inc.admin.master')
<style>
    .chat-list {
        height: 500px; /* Adjust this height as needed */
        overflow-y: auto;
    }
    .chat-body {
        flex-grow: 1;
        overflow-y: auto;
        height: 350px; /* Adjust this height as needed */
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        background: #f9f9f9;
    }
    .chat-message {
        display: flex;
        margin-bottom: 10px;
    }
    .chat-message.sent {
        justify-content: flex-end;
    }
    .chat-message.received {
        justify-content: flex-start;
    }
    .chat-bubble {
        margin-left: 5px;
        max-width: 60%;
        padding: 10px;
        border-radius: 15px;
        position: relative;
    }
    .chat-bubble.sent {
        background-color: #DCF8C6;
        border-bottom-right-radius: 0;
    }
    .chat-bubble.received {
        background-color: #E4E6EB;
        border-bottom-left-radius: 0;
    }
    .chat-footer {
        display: flex;
        align-items: center;
    }
</style>
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="d-flex">
                    <i class="mdi mdi-chat menu-icon"></i>
                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Chat&nbsp;/&nbsp;</p>
                    <p class="text-primary mb-0 hover-cursor">Daftar Chat User </p>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <!-- Recent Chats Column -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <center><h4 class="card-title" style="padding: 10px; margin:auto;">List Chat</h4></center>
                    </div>
                    <div class="card-body chat-list">
                        <form action="" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search by name">
                            </div>
                            <center>
                                <div class="btn-group" role="group" aria-label="Filter">
                                    <button type="submit" class="btn btn-outline-primary" name="status" value="">All</button>
                                    <button type="submit" class="btn btn-outline-primary" name="status" value="1">Read</button>
                                    <button type="submit" class="btn btn-outline-primary" name="status" value="0">Unread</button>
                                </div>
                            </center>
                        </form>


                        <ul class="list-group list-group-flush">
                            @foreach ($data as $datas )
                            <a href="{{ route('jawabAdmin.show', $datas['sender_id']) }}" style="text-decoration: none;">
                                <li class="list-group-item d-flex justify-content-between align-items-center" style="border: none">
                                    <div>
                                        <img src="{{asset($datas['foto'])}}" alt="image" class="profile-pic" style="height: 55px;width: 55px;border-radius: 100%;margin-right: 5px;float: left;">

                                    </div>
                                    <div>
                                        <h5 class="mb-1">{{$datas['name']}}</h5>
                                        <p class="mb-0 text-muted">{{$datas['latest_message']}}</p>
                                        <p class="mb-0 text-muted">{{$datas['created_at']}}</p>
                                    </div>
                                    @if ($datas['status'] == '0')
                                        {{-- <span class="badge bg-danger rounded-pill">Unread</span> --}}
                                        <span class="badge bg-danger rounded-pill">{{'Unread : '.$datas['status_count']}}</span>
                                        @else
                                        <span class="badge bg-success rounded-pill">Read</span>
                                    @endif

                                </li>
                            </a>
                            <hr>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Chat Detail and Reply Column -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <img src="{{asset($dataNama->foto)}}" alt="image" class="profile-pic" style="height: 55px;width: 65px;border-radius: 100%;margin-right: 20px;float: left;">
    <h4 class="card-title" style="padding: 20px; margin:auto;">{{$dataNama->name}}</h4>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="chat-body flex-grow-1">
                            <div class="chat-message sent">
                                <div class="chat-bubble sent">
                                    Halo ada yang bisa kami bantu?
                                </div>
                                <div class="row">
                                    <img src="{{asset('admin/images/faces/face1.jpg')}}" alt="image" class="profile-pic" style="height:45px;width:65px;border-radius:100%;">
                                </div>
                            </div>
                            @foreach ($dataDetail as $dataDetails )
                                    @if($dataDetails['sender_id'] == Auth::user()->id)
                                    <div class="chat-message sent">
                                        <div class="chat-bubble sent">
                                            {{$dataDetails['message']}}
                                        </div>
                                        <div class="row">
                                            <img src="{{asset('admin/images/faces/face1.jpg')}}" alt="image" class="profile-pic" style="height:45px;width:65px;border-radius:100%;">
                                        </div>
                                    </div>
                                    <div class="chat-message sent" style="font-size: 10px;">
                                        {{$dataDetails['created_at']}}
                                    </div>
                                    @else
                                    <div class="chat-message received">
                                        <div class="row">
                                            <img src="{{asset($dataDetails['foto'])}}" alt="image" class="profile-pic" style="height:45px;width:65px;border-radius:100%;">
                                        </div>
                                        <div class="chat-bubble received">
                                            {{$dataDetails['message']}}
                                        </div>
                                    </div>
                                    <div class="chat-message received" style="font-size: 10px;">
                                        {{$dataDetails['created_at']}}
                                    </div>
                                    @endif
                            @endforeach
                        </div>
                        <form method="POST" action="{{route('jawabAdmin.store')}}" class="mt-3">
                            @csrf
                            <div class="chat-footer input-group">
                                <input type="hidden" name="receiver_id" value="{{$dataDetails['dataParam']}}">
                                <input type="text" class="form-control" name="message" placeholder="Type your message...">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

