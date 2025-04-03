@extends('dashboard')

@section('content')
<main class="signup-form">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Đăng Ký</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('user.postUser') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" required autofocus>
                                        @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                <label class="form-label">Like</label>
                                <input type="text" class="form-control" name="like" required autofocus>
                                @error('like')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Facebook</label>
                                <input type="text" class="form-control" name="facebook" required autofocus>
                            @error('facebook')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Mật khẩu</label>
                                        <input type="password" class="form-control" name="password" required>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nhập lại mật khẩu</label>
                                        <input type="password" class="form-control" name="password_confirmation" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Ảnh đại diện</label>
                                        <input type="file" class="form-control" name="image" id="imageInput" accept="image/*" required>
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Đăng Ký</button>
                                    </div>
                                </form>

                                <div class="text-center mt-3">
                                    <a href="{{ route('login') }}">Đã có tài khoản? Đăng nhập</a>
                                </div>
                            </div>

                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <img id="previewImage" class="img-fluid rounded shadow" style="max-width: 50%; height: auto; display: none;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.getElementById('imageInput').addEventListener('change', function(event) {
        let file = event.target.files[0];
        let previewImage = document.getElementById('previewImage');

        if (file) {
            let reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            previewImage.style.display = 'none';
        }
    });
</script>
@endsection
