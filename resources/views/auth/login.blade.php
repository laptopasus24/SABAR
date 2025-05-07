<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SABAR</title>

        @include('include.style')
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="{{ route('login') }}">
                            <img src="{{ asset('template/assets/images/logo/domba2.png') }}" 
                                 alt="Logo" 
                                 class="img-fluid move-left-tilt"
                                 style="width: 300px; height: auto;">
                        </a>     
                    </div>
                                                                                                                
                    
                    {{-- <h1 class="auth-title">Log in.</h1> --}}
                    <p class="auth-subtitle mb-5">Masukkan data login Anda yang telah terdaftar.</p>
    
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="email" class="form-control form-control-xl" placeholder="Email" required>
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
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
            
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" name="remember" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Ingat Saya.
                            </label>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Log in</button>
                    </form>
    
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Belum Mempunyai Akun? <br>
                            <a href="{{ route('register') }}" class="font-bold">Registrasi</a>.
                        </p><br>
                        <p><a class="font-medium" href="#">Lupa Kata Sandi Atau password?</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>
    </body>
    @include('include.script')
</html>