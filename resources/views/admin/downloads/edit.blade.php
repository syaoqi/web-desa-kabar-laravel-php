@extends('layouts.admin')
@section('container')
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Forms</h4>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
                                 <form method="post" action="/downloads/{{ $download->slug }}" enctype="multipart/form-data" class="form-horizontal">
                                    @method('put')
                                    @csrf
								<div class="card-header">
									<div class="card-title">Ubah File Dokumen</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="title">judul</label>
												<input type="text" class="form-control @error('title') is-invalid
                                                @enderror" id="title" name="title" value="{{ old('title', $download->title) }}" required >
                                                @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
											</div>
											<div class="form-group">
												<label for="slug">Slug</label>
												<input type="text" class="form-control @error('slug') is-invalid
                                                @enderror" id="slug" name="slug" value="{{ old('slug', $download->slug) }}" required >
                                                @error('slug')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
											</div>
                                    <div class="form-group">

                                        <label for="document">Dokumen</label>
                                        <input type="hidden" name="oldDocument" value="{{ $download->document }}">
                                    <input type="file" name="document" class="form-control @error('document') is-invalid @enderror" id="document" name="document"
                                     required>
                                    @error('document')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

										</div>
									</div>
								</div>
								<div class="card-action">
									<button class="btn btn-success">Submit</button>
									<button class="btn btn-danger">Cancel</button>
								</div>
							</div>
                        </form>
						</div>
					</div>
				</div>

 <script>
         const title = document.querySelector('#title');
         const slug = document.querySelector('#slug');

         title.addEventListener('change', function() {
             fetch('/downloads/checkSlug?title=' + title.value)
                 .then(response => response.json())
                 .then(data => slug.value = data.slug)
         });

     </script>
@endsection
