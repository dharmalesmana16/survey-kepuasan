@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="card-style p-4 pb-0 mb-3">
            <div class="card-body">


                <div class="d-flex justify-content-between">
                    <div class="bd-highlight">
                        <h4 class="fw-bold ">Updata Data </h4>

                    </div>
                    <div class="bd-highlight">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">

                                {{ Breadcrumbs::render('newLayanan') }}
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-style ">

            <div class="card-body">
                <form action="/api/video/{{ $data['id'] }}" method="post" id="data" class="updateData"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <input type="hidden" class="id" name="id" value="{{ $data['id'] }}">
                        <label for="judul_video" class="col-sm-2 col-form-label">Judul Video</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="judul_video" id="judul_video"
                                placeholder="Masukkan Judul Video" value="{{ $data['judul_video'] }}"">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-2">

                        </div>
                        <div class="col-sm-10">

                            <input class="form-control file_video" type="file" name="file_video">
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btncreate">Update Data</button>
                    </div>

            </div>
        </div>
        </form>
    </div>
    <script>
        $('.updateData').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'post',
                url: $(this).attr('action'),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                enctype: 'multipart/form-data',
                processData: false, // Important!
                contentType: false,
                data: new FormData(this),
                // dataType: "json",
                beforeSend: function() {
                    $('.btncreate').attr('disable', 'disabled');
                    $('.btncreate').html('<i class="fa fa-spin fa-spinner"> </i>');
                },
                complete: function() {
                    $('.btncreate').removeAttr('disable');
                    $('.btncreate').html('Update Data');
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: response["msg"],
                        showConfirmButton: false
                    });
                    setTimeout(function() { // wait for 1 secs(2)
                        window.location = '/dashboard/video'; // then reload the page.(3)
                    }, 1000);
                },
                error: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: response["err"],
                        showConfirmButton: false
                    });
                }
            });
        })
    </script>
@endsection
