@extends('layouts.app')
@section('content')
    <div class="card-style p-4 pb-0 mb-3">
        <div class="card-body">


            <div class="d-flex justify-content-between">
                <div class="bd-highlight">
                        @php
                        $disabled = "";
                        $updateData = "";

                        if(count($data) > 0){
                            $disabled .= "disabled";
                            $updateData .= "none";
                        }else{
                            $updateData .= "hidden";
                        }
                        @endphp
                    <a href='/dashboard/video/new' class="btn btn-md btn-success {{ $disabled }}">
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


        @foreach ($data as $res)
            <div class="col">
                <div class="card  p-2">
                    <div class="text-center">
                        <video autoplay muted loop id="myVideo" class="rounded w-100">
                            <source src="/storage/{{ $res['file_video'] }}" type="video/mp4">
                        </video>
                        {{-- <img src="/storage/{{ $res['file_video'] }}" width="200" class="img-fluid"> --}}
                    </div>
                    <div class="card-body text-end">
                        <h5 class="text-end display-6">Judul Video : {{ $res['judul_video'] }}</h5>
                        <div class="p-2">

                            <a href='/dashboard/video/update/{{ $res['id'] }}' class="btn btn-md btn-primary " style="visibility: {{ $updateData }}">
                                Update Video
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

@endsection
