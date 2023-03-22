@extends('layouts.auth')
@section('title')
    Login
@endsection
@section('login')
<div class="container container-login container-transparent animated fadeIn">
      <form class="form-horizontal m-t-20" id="loginform" action="/login" method="post">
                        @csrf
                        @if (session()->has('success'))
                            <div class="alert alert-success rounded-top rounded-bottom" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session()->has('loginError'))
                            <div class="alert alert-danger rounded-top rounded-bottom" role="alert">
                                {{ session('loginError') }}
                            </div>
                        @endif
				<h3 class="text-center">Sign In</h3>
				<div class="login-form">
					<div class="form-group">
						<label class="placeholder"><b>Nama Pengguna</b></label>
						<input id="username" name="username" type="text"
                        class="form-control @error('username') is-invalid @enderror" required>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
					</div>
					<div class="form-group">
						<label for="password" class="placeholder"><b>Kata Sandi</b></label>
						{{-- <a href="#" class="link float-right">Forget Password ?</a> --}}
						<div class="position-relative">
							<input id="password" name="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" required>
                              @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
							<div class="show-password">
								<i class="icon-eye"></i>
							</div>
						</div>
					</div>
					<div class="form-group form-action-d-flex mb-3">
						{{-- <div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="rememberme">
							<label class="custom-control-label m-0" for="rememberme">Remember Me</label>
						</div> --}}
                        <a class="btn btn-danger col-md-5 mt-3 mt-sm-0 fw-bold" href="/">Kembali</a>
                         <button class="btn btn-secondary col-md-5 mt-3 mt-sm-0 fw-bold " type="submit">Masuk</button>

                    </div>
					<div class="login-account">
						<span class="msg">Tidak Punya Akun ?</span>
						<a href="/register" id="show-signup" class="link">Daftarkan</a>

					</div>
				</div>
            </form>
			</div>



@endsection
