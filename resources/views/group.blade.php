@extends('layouts.common')
@section('content')
    <div class="d-flex justify-content-center">
        <div>
            <h3 class="text-center ask p-4 fw-bold">
                Pilih Jenis Layanan
            </h3>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
        @foreach ($dataLayanan as $res)
            <div class="col">
                <a href="/survey/{{ $res['slug'] }}" class="text-decoration-none">
                    <div class="card myCard p-5" style="border-radius: 40px">
                        <div class="text-center h-100">
                            <img src="/storage/{{ $res['icon'] }}" width="250" class="img-fluid">
                        </div>
                        <div class="card-body">
                            <p class="card-title display-6 text-center ">{{ $res['nama_pelayanan'] }}</p>

                        </div>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
@endsection
