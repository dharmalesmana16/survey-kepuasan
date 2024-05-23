@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="card-style ">

            <h6 class="mb-10" id="root">Tambah Layanan</h6>
            <div class="card-body">
                <form action="{{ url('/api/layanan') }}" method="post" id="datadevices" class="createdevice">
                    @csrf
                    <div class="row mb-3">
                        <label for="nama_layanan" class="col-sm-2 col-form-label">Nama Layanan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_layanan" id="nama_layanan"
                                placeholder="Masukkan nama layanan" value={{ $data['nama_layanan'] }}>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-2">

                        </div>
                        <div class="col-sm-10">

                            <input class="form-control" type="file" name="icon" id="formFile">
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btncreate">Tambah Data</button>
                    </div>

            </div>
        </div>
        </form>
    </div>
@endsection
