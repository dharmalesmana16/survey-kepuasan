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
        @foreach ($data as $res)
            <div class="col">
                <div class="card myCard">
                    <div class="text-center">

                        <img src="/storage/{{ $res['file_video'] }}" width="200" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <h3 class=" text-center">{{ $res['judul_video'] }}</h3>

                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
