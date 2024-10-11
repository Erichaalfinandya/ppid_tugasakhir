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
                    <i class="mdi mdi-headphones menu-icon"></i>
                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Chat&nbsp;/&nbsp;</p>
                    <p class="text-primary mb-0 hover-cursor">Tanya Admin</p>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <center><h4 class="card-title" style="padding: 20px; margin:auto;">Tanya Admin</h4></center>

                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="chat-body flex-grow-1">
                          <div class="chat-message received">
                            <div class="row">
                              <img src="{{asset('admin/images/faces/face1.jpg')}}" alt="image" class="profile-pic" style="height:45px;width:65px;border-radius:100%;">
                            </div>
                            <div class="chat-bubble received">
                            Halo ada yang bisa kami bantu?
                            </div>
                          </div>
                          @foreach ($data as $datas )
                            @if($datas['sender_id'] == Auth::user()->id)
                            <div class="chat-message sent">
                                <div class="chat-bubble sent">
                                    {{$datas['message']}}
                                </div>
                                <div class="row">
                                  <img src="{{asset($datas['foto'])}}" alt="image" class="profile-pic" style="height:45px;width:65px;border-radius:100%;">
                                </div>
                            </div>
                            <div class="chat-message sent" style="font-size: 10px;">
                              {{$datas['created_at']}}
                            </div>
                            @else
                            <div class="chat-message received">
                              <div class="row">
                                  <img src="{{asset('admin/images/faces/face1.jpg')}}" alt="image" class="profile-pic" style="height:45px;width:65px;border-radius:100%;">
                              </div>
                              <div class="chat-bubble received">
                                  {{$datas['message']}}
                              </div>
                            </div>
                            <div class="chat-message received" style="font-size: 10px;">
                              {{$datas['created_at']}}
                            </div>
                            @endif
                          @endforeach
                        </div>
                        <form method="POST" action="{{route('tanyaAdmin.store')}}">
                            @csrf
                            <div class="chat-footer input-group" style="margin-top:10px">
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

