@extends('layouts.admin')
@section('container')
    <div class="container">
        <div class="page-inner">
            <h4 class="page-title">Tambah Data Penduduk</h4>
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-with-nav">
                        <form method="post" action="/penduduks/{{ $penduduk->id }}" enctype="multipart/form-data"
                            class="form-horizontal">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="name">Nama Panjang</label>
                                            <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                                name="name" placeholder="Nama Panjang" id="name"
                                                value="{{ old('name', $penduduk->name) }}" autofocus required>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="nik">NIK</label>
                                            <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                                name="nik" placeholder="NIK" id="nik"
                                                value="{{ old('nik', $penduduk->nik) }}" required>
                                            @error('nik')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                            <input type="date"
                                                class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir"
                                                name="tgl_lahir" value="{{ old('tgl_lahir', $penduduk->tgl_lahir) }}"
                                                placeholder="Tanggal Lahir" required>
                                            @error('tgl_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Umur</label>
                                            <input type="number" class="form-control @error('umur') is-invalid @enderror"
                                                value="{{ old('umur', $penduduk->umur) }}" name="umur" id="umur"
                                                placeholder="Umur" required>
                                        </div>
                                        @error('umur')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Jenis Kelamin</label>
                                           <select class="form-control" id="jk" name="jk">
                                                <option value="laki-laki" {{ $penduduk->jk == 'laki-laki' ? 'selected' : ''}}>Laki-Laki</option>
                                                <option value="perempuan" {{ $penduduk->jk == 'perempuan' ? 'selected' : ''}}>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Pekerjaan</label>
                                            <input type="text"
                                                class="form-control @error('pekerjaan') is-invalid @enderror"
                                                name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan"
                                                value="{{ old('pekerjaan', $penduduk->pekerjaan) }}" required>
                                            @error('umur')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3 mb-1">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="alamat">Alamat</label>
                                            <input type="text"
                                                class="form-control @error('pekerjaan') is-invalid @enderror"
                                                value="{{ old('alamat', $penduduk->alamat) }}" name="alamat"
                                                id="alamat" placeholder="Alamat" required>
                                            @error('umur')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right mt-3 mb-3">
                                    <button class="btn btn-warning">Ubah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
