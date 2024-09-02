@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="card-style ">

            <h6 class="mb-10" id="root">Update Layanan</h6>
            <div class="card-body">
                <form action="/layanan/update/{{ $data['id'] }}" method="post" id="updateData" class="updateData">
                    @csrf
                    {{-- @method('PUT') --}}
                    <input type="hidden" name="id" value="{{ $data["id"] }}">
                    <div class="row mb-3">
                        <label for="nama_layanan" class="col-sm-2 col-form-label">Nama Layanan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_layanan" id="nama_layanan"
                                placeholder="Masukkan nama layanan" value="{{ $data['nama_pelayanan'] }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-2">
                            <img src="/storage/{{ $data["icon"] }}" class="img-thumbnail" alt="...">
                        </div>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="icon" id="formFile">
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btnUpdate">Update Data</button>
                    </div>

            </div>
        </div>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded",function(){


  $('.updateData').submit(function(e) {
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
                    $('.btnUpdate').attr('disable', 'disabled');
                    $('.btnUpdate').html('<i class="fa fa-spin fa-spinner"> </i>');
                },
                complete: function() {
                    $('.btnUpdate').removeAttr('disable');
                    $('.btnUpdate').html('Tambah Data');
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
        })
    </script>
@endsection
