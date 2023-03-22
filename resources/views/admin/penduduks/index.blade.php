@extends('layouts.admin')
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-sub">
                            <h4 class="card-title">Data Penduduk Desa Kabar</h4>
                        </div>
                        <a href="/penduduks/create" class="btn btn-primary">Tambah</a>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" style="width:145%">
                                <thead>
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col"  style="width:15%">Nama Panjang</th>
                                        <th scope="col">Nik</th>
                                        <th scope="col">Tanggal Lahir</th>
                                        <th scope="col">Umur</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Pekerjaan</th>
                                        <th scope="col">alamat</th>
                                        <th scope="col" style="width:9%">Tools</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Nama Panjang</th>
                                        <th scope="col">Nik</th>
                                        <th scope="col">Tanggal Lahir</th>
                                        <th scope="col">Umur</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Pekerjaan</th>
                                        <th scope="col">alamat</th>
                                        <th scope="col">Tools</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($penduduks as $penduduk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $penduduk->name }}</td>
                                            <td>{{ $penduduk->nik }}</td>
                                            <td>{{ $penduduk->tgl_lahir }}</td>
                                            <td>{{ $penduduk->umur }}</td>
                                            <td>{{ $penduduk->jk }}</td>
                                            <td>{{ $penduduk->pekerjaan }}</td>
                                            <td>{{ $penduduk->alamat }}</td>
                                            <td>
                                                <a href="/penduduks/{{ $penduduk->id }}/edit"
                                                    class="btn btn-warning btn-sm">
                                                    <span class="icon-note"></span></a>
                                                <form action="/penduduks/{{ $penduduk->id }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Anda Yakin?')"><span
                                                            class="icon-trash"></span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
