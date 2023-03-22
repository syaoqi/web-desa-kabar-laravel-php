@extends('layouts.admin')
@section('container')
    <div class="container">
		<div class="page-inner">
		    <div class="row">
				<div class="col-md-6">
					<div class="card">
								<div class="card-header">
									<h4 class="card-title text-center">Kotak Saran</h4>
									<a href="/kotaksarans/create" class="btn btn-secondary btn-sm">Tambah</a>
								</div>
								<div class="card-body">
									@foreach ( $kotaksarans as $kotaksaran )


                                            <h4 class="font-medium"> <b> {{ $kotaksaran->author->name }} </b></h4>
									<div class="tab-content mt-2 mb-3" id="pills-tabContent">
										<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
												<span>{{ $kotaksaran->saran }}</span>
										</div>

								</div>
                                  <a href="/kotaksarans/{{ $kotaksaran->id }}/edit"
                                        class="btn btn-warning btn-sm">Ubah</a>

                                    <form action="/kotaksarans/{{ $kotaksaran->id }}" method="post"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda Yakin?')">Hapus</button>
                                        <p></p>
                                    </form>
								@endforeach
                                </div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
