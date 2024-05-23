@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="card-style p-4 pb-0 mb-3">
            <div class="card-body">


                <div class="d-flex justify-content-between">
                    <div class="bd-highlight">
                        <h4 class="fw-bold ">Tambah Layanan</h4>

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
                <form action="{{ url('/api/layanan') }}" method="post" id="data" class="createdata"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="nama_layanan" class="col-sm-2 col-form-label">Nama Layanan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_layanan" id="nama_layanan"
                                placeholder="Masukkan nama layanan" value="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-2">

                        </div>
                        <div class="col-sm-10">

                            <input class="form-control" type="file" name="icon">
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btncreate">Tambah Data</button>
                    </div>

            </div>
        </div>
        </form>
    </div>
    <script>
        $('.createdata').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                enctype: 'multipart/form-data',
                processData: false, // Important!
                contentType: false,
                data: new FormData(this),
                dataType: "json",
                beforeSend: function() {
                    $('.btncreate').attr('disable', 'disabled');
                    $('.btncreate').html('<i class="fa fa-spin fa-spinner"> </i>');
                },
                complete: function() {
                    $('.btncreate').removeAttr('disable');
                    $('.btncreate').html('Tambah Data');
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: response["msg"],
                        showConfirmButton: false
                    });
                    setTimeout(function() { // wait for 1 secs(2)
                        window.location = '/dashboard/layanan'; // then reload the page.(3)
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
