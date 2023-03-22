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
                        <a href="/admins/create" class="btn btn-primary">Tambah</a>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
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
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->nik }}</td>
                                            <td>{{ $admin->tgl_lahir }}</td>
                                            <td>{{ $admin->umur }}</td>
                                            <td>{{ $admin->jk }}</td>
                                            <td>{{ $admin->pekerjaan }}</td>
                                            <td>{{ $admin->alamat }}</td>
                                            <td>
                                                <a href="/admins/{{ $admin->id }}/edit"
                                                    class="btn btn-warning btn-sm">
                                                    <span class="icon-note"></span></a>
                                                <form action="/admins/{{ $admin->id }}" method="post"
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
