@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="card-style ">

            <h6 class="mb-10" id="root">Tambah Pertanyaan</h6>
            <div class="card-body">
                <form action="{{ url('/api/question') }}" method="post" id="data" class="createdata">
                    @csrf
                    <div class="row mb-3">
                        <label for="judul_pertanyaan" class="col-sm-2 col-form-label">Judul Pertanyaan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="judul_pertanyaan" id="judul_pertanyaan"
                                placeholder="Masukkan Judul Pertanyaan" value="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="group_id" class="col-sm-2 col-form-label">Pertanyaan untuk jenis layanan </label>
                        <div class="col-sm-10">
                            <select name="group_id" id="group_id" class="form-control" aria-label="Default select example">
                                @foreach ($data as $res)
                                    <option value={{ $res['id'] }}>{{ $res['nama_pelayanan'] }}</option>
                                @endforeach
                                <!-- <option value="RASPBERRY PI">RASPBERRY PI</option> -->
                            </select>
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
                        window.location = '/dashboard/question'; // then reload the page.(3)
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
