@extends('dashboard')

@section('content')
<main class="login-form">
    <div class="container mt-5 content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body p-5">
                        <h3 class="text-center mb-4">Màn Hình Chi Tiết</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="ms-5 mb-3" style="display: none;">
                                    <strong class="me-5">Id:</strong> {{$messi->id}}
                                </div>
                                <div class="ms-5 mb-3">
                                    <strong class="me-5">Username:</strong> {{$messi->username}}
                                </div>
                                <div class="ms-5 mb-3">
                                    <strong class="me-5">Like:</strong> {{$messi->like}}
                                </div>
                                <div class="ms-5 mb-3">
                                    <strong class="me-5">Facebook:</strong> {{$messi->facebook}}
                                </div>
                                <div class="ms-5 mb-3">
                                    <strong class="me-5">Email:</strong> {{$messi->email}}
                                </div>
                                <div class="text-end">
                                    <a class="btn btn-primary" href="{{ route('user.updateUser', ['id' => $messi->id]) }}">Chỉnh Sửa</a>
                                </div>
                            </div>
                           
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <!-- Ensure the image path is correct and accessible -->
                                <img src="{{ asset('storage/avatars'. $messi->image) }}"  class="img-fluid rounded shadow" 
                             style="max-width: 80%; max-height: 250px; ">


                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection