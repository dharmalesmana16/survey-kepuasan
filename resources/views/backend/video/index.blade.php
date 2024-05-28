@extends('layouts.app')
@section('content')
    <div class="card-style p-4 pb-0 mb-3">
        <div class="card-body">


            <div class="d-flex justify-content-between">
                <div class="bd-highlight">

                    <a href='/dashboard/video/new' class="btn btn-md btn-success">
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


    <div class="row row-cols-1 row-cols-md-3 g-4">
        {{-- @foreach ($data as $res) --}}
        <div class="col">
            <div class="card myCard rounded">
                {{-- <div class="text-center "> --}}

                <video autoplay muted loop id="myVideo" width="350" class="card-img-top">
                    <source src="/storage/{{ $data->file_video }}" type="video/mp4">
                </video>
                {{-- </div> --}}
                <div class="card-body">
                    <p class="fs-5 lead">Nama Video : <span> {{ $data['judul_video'] }}</span> </p>
                    <p class="fs-5 lead">Tipe Video : .mp4 </p>
                    {{-- <p class="fs-5 lead">Diupload : <span> {{ $res['created_at'] }}</span> </p> --}}

                    {{-- <h3 class=" text-center"></h3> --}}

                </div>
                <a href='/dashboard/video/update/{{ $data['id'] }}' class="btn btn-primary btn-lg">Edit</a>
            </div>
        </div>
        {{-- @endforeach --}}

    </div>
@endsection
