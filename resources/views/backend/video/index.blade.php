@extends('layouts.app')
@section('content')
    <div class="card-style p-4 pb-0 mb-3">
        <div class="card-body">


            <div class="d-flex justify-content-between">
                <div class="bd-highlight">

                    <a href='/dashboard/video/new' class="btn btn-md btn-success disabled">
                        Add New Data
                    </a>


                </div>
                <div class="bd-highlight">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">

                            {{ Breadcrumbs::render('Layanan') }}
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>



    <div class="card myCard rounded">
        {{-- <div class="text-center "> --}}

        <video autoplay muted loop id="myVideo" width="350" class="card-img-top">
            <source src="/storage/{{ $data->file_video }}" type="video/mp4">
        </video>
        {{-- </div> --}}
        <div class="card-body">
            <h5 class="card-title">Nama Video : <span> {{ $data['judul_video'] }}</span> </h5>
            <div class="card-text">
                <p class="fs-6 lead">Tipe Video : .mp4 </p>

            </div>
            {{-- <p class="fs-5 lead">Diupload : <span> {{ $res['created_at'] }}</span> </p> --}}

            {{-- <h3 class=" text-center"></h3> --}}
            <div class="mt-3">

                <a href='/dashboard/video/update/{{ $data['id'] }}' class="btn btn-primary btn-lg">Edit</a>
            </div>
        </div>
    </div>
@endsection
