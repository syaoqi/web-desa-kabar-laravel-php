 @extends('layouts.guest')
 @section('title')
    Unduh Format Surat | Desa Kabar
@endsection
 @section('content')
     <div class="container-xxl py-5 ">
         <div class="container ">
             <div class="card text-dark col-lg-11">
                 <div class="card-header ">
                     <div class="card-title ">Unduh Format Surat</div>
                 </div>
                 <div class="card-body">

                     <table class="table mt-3 text-dark">
                         <thead>
                             <tr>

                                 <th scope="col">Nama Surat</th>
                                 <th scope="col">Download</th>

                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($downloads as $download)
                                    <tr>

                                        <td>{{ $download->title }}</td>
                                        <td>
                                            <a href="{{ asset('storage/'.$download->document) }}" class="btn btn-primary ">Unduh</a>
                                        </td>

                             @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
      @if ($downloads->count())
        <div class="d-flex justify-content-center">
            {{ $downloads->links() }}
        </div>

    @endif()
 @endsection
