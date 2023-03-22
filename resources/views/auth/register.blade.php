@extends('layouts.auth')
@section('title')
    Register
@endsection
@section('register')
    <div class="container col-9 container-transparent animated fadeIn">
        <h3 class="text-center">Sign Up</h3>
        <form action="/register" class="form-horizontal m-t-20" method="POST">
            @csrf

            <div class="login-form">
                <div class="form-group">
                    <label class="placeholder"><b>Nama Panjang</b></label>
                    <input id="name" name="name" type="text"
                        class="form-control @error('name') is-invalid @enderror" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
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
                    <label for="nik" class="placeholder"><b>NIK</b></label>
                    <input id="nik" min="16" max="16" name="nik" type="text"
                        class="form-control @error('nik') is-invalid @enderror" required>
                    @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="placeholder"><b>Kata Sandi</b></label>
                    <div class="position-relative">
                        <input id="password" name="password" type="password"
                            class=" mb-2 form-control @error('password') is-invalid @enderror" required>
                        <div class="show-password">
                            <i class="icon-eye"></i>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                {{-- <div class="form-group">
						<label for="confirmpassword" class="placeholder"><b>Confirm Password</b></label>
						<div class="position-relative">
							<input  id="confirmpassword" name="confirmpassword" type="password" class="form-control" required>
							<div class="show-password">
								<i class="icon-eye"></i>
							</div>
						</div>
					</div> --}}
                {{-- <div class="row form-sub m-0">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" name="agree" id="agree">
							<label class="custom-control-label" for="agree">I Agree the terms and conditions.</label>
						</div>
					</div> --}}
                <div class="row form-action">
                    <div class="col-md-6">
                        <a class="btn btn-danger w-100 fw-bold" href="/login">Kembali</a>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-secondary w-100 fw-bold" type="submit">Daftarkan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
