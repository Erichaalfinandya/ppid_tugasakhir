@extends('layouts.inc.admin.master')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Notifikasi Layanan Informasi</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-headset menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Notifikasi&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">Notifikasi Layanan Informasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Unread Notifications -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Notifikasi Baru
                    </div>
                    <div class="card-body">
                        @if($newNotifications->isEmpty())
                            <p class="text-muted">Tidak ada notifikasi baru.</p>
                        @else
                            <ul class="list-group">
                                @foreach($newNotifications as $notification)
                                    <li class="list-group-item">
                                        <h5>{{ $notification->title }}</h5>
                                        <p>{{ $notification->message }}</p>
                                        <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                        <div class="mt-2">
                                            <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">Tandai sebagai Dibaca</button>
                                            </form>
                                            {{-- <a href="{{ route('notifications.redirectTo', $notification->id) }}" class="btn btn-primary btn-sm mt-2">Lihat Detail</a> --}}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Read Notifications -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        Notifikasi Terbuka
                    </div>
                    <div class="card-body">
                        @if($readNotifications->isEmpty())
                            <p class="text-muted">Tidak ada notifikasi terbuka.</p>
                        @else
                            <ul class="list-group">
                                @foreach($readNotifications as $notification)
                                    <li class="list-group-item">
                                        <h5>{{ $notification->title }}</h5>
                                        <p>{{ $notification->message }}</p>
                                        <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('notifikasi.delete', $notification->id) }}" method="POST" class="mt-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .card-header {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .list-group-item {
            margin-bottom: 0.5rem;
        }
    </style>
@endpush
