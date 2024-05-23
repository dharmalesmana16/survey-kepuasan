@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="card-style p-4 pb-0 mb-3">
            <div class="card-body">


                <div class="d-flex justify-content-between">
                    <div class="bd-highlight">
                        <h4 class="fw-bold ">Tambah User</h4>

                    </div>
                    <div class="bd-highlight">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">

                                {{ Breadcrumbs::render('newUser') }}
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-style ">

            <div class="card-body">
                <form action="{{ url('/api/users') }}" method="post" id="data" class="createdata"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="first_name" class="col-sm-3 col-form-label">Nama Depan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="first_name" id="first_name"
                                placeholder="Masukkan nama depan" value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="last_name" class="col-sm-3 col-form-label">Nama Belakang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="last_name" id="last_name"
                                placeholder="Masukkan nama belakang" value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" id="username"
                                placeholder="Masukkan username" value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Masukkan password" value="">
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <label for="confirm_password" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="confirm_password" id="confirm_password"
                                value="">
                        </div>
                    </div> --}}

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btncreate">Tambah Data</button>
                    </div>

            </div>
        </div>
        </form>
    </div>
    <script>
        // $('#confirm_password').keypress(function(e) {

        //     let password = $('#password').val();
        //     let confirm_password = $('#confirm_password').val();
        //     if (confirm_password != password) {
        //         console.log("tidak cocok");
        //     }
        // });
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
