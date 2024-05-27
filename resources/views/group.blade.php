@extends('layouts.common')
@section('content')
    <div class="d-flex justify-content-center">
        <div>
            <h3 class=" text-center ask p-4 ">
                Pilih Jenis Layanan
            </h3>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
        @foreach ($dataLayanan as $res)
            <div class="col">
                <a href="/survey/{{ $res['slug'] }}">
                    <div class="card myCard" style="border-radius: 40px">
                        <div class="text-center">
                            <img src="/storage/{{ $res['icon'] }}" width="250" class="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title display-5 text-center ">{{ $res['nama_pelayanan'] }}</h5>

                        </div>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
@endsection
