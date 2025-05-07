<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SABAR</title>

    @include('include.style')
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="{{route('register')}}">
                            <img src="{{asset('template/assets/images/logo/domba2.png') }}" alt="Logo" class="img-fluid" style="width: 300px; height: auto;">
                        </a>     
                    </div>
                    {{-- <h1 class="auth-title">Sign Up</h1> --}}
                    <p class="auth-subtitle mb-5">Masukkan data Untuk daftarkan akun Anda.</p>
    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
    
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="name" class="form-control form-control-xl" placeholder="Nama Anda" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="email" class="form-control form-control-xl" placeholder="Email" required>
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="no_telp" class="form-control form-control-xl" placeholder="Nomor Telepon" required>
                            <div class="form-control-icon">
                                <i class="bi bi-telephone"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="alamat" class="form-control form-control-xl" placeholder="Alamat" required>
                            <div class="form-control-icon">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="number" name="jumlah_ternak" class="form-control form-control-xl" placeholder="Jumlah Ternak" required>
                            <div class="form-control-icon">
                                <i class="bi bi-list-ol"></i>
                            </div>
                        </div>
                        <!-- Input Password -->
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" id="password" name="password" class="form-control form-control-xl" placeholder="Password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <span id="toggleWrapper1" class="position-absolute top-50 end-0 translate-middle-y me-3"
                                onclick="togglePassword('password', 'toggleIcon1')" style="cursor: pointer; display: none;">
                                <i class="bi bi-eye" id="toggleIcon1"></i>
                            </span>
                        </div>

                        <!-- Input Konfirmasi Password -->
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-xl" placeholder="Confirm Password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <span id="toggleWrapper2" class="position-absolute top-50 end-0 translate-middle-y me-3"
                                onclick="togglePassword('password_confirmation', 'toggleIcon2')" style="cursor: pointer; display: none;">
                                <i class="bi bi-eye" id="toggleIcon2"></i>
                            </span>
                        </div>                      
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Sign Up</button>
                    </form>
    
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Sudah Mempunyai Akun? <br> <a href="{{ route('login') }}" class="font-bold">Log in</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>
    @include('include.script')

    </body>    
</html>