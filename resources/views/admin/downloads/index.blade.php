@extends('layouts.admin')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-sub">
                            <div class="card-title">Data Format Surat</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="/downloads/create" class="btn btn-primary">Tambah</a>
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($downloads as $download)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $download->title }}</td>

                                        <td>
                                            <a href="/downloads/{{ $download->slug }}/edit" class="btn btn-warning btn-sm">
                                                <span class="icon-note"></span></a>
                                            <form action="/downloads/{{ $download->slug }}" method="post" class="d-inline">
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
@endsection
