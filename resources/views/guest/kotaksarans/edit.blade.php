@extends('layouts.admin')
@section('container')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Forms</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="post" action="/kotaksarans/{{ $kotaksaran->id }}" class="form-horizontal">
                        @method('put')
                        @csrf
                        <div class="card-header">
                            <div class="card-title">Tambakan Saran</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="user_id">Nama</label>
                                        <input type="text" class="form-control" disabled name="user_id"
                                            placeholder="{{ auth()->user()->name }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="saran">Saran</label>
                                        <div class="form-floating">
                                            <textarea class="form-control @error('saran') is-invalid
                                            @enderror" id="saran" name="saran" id="floatingTextarea" required autofocus>
                                            {{ old('saran', $kotaksaran->saran) }}

												</textarea>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <button class="btn btn-success">Ubah</button>
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
