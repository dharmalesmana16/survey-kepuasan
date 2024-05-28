@extends('layouts.app')
@section('content')
    <div class="card-style p-4 pb-0 mb-3">
        <div class="card-body">


            <div class="d-flex justify-content-between">
                <div class="bd-highlight">
                    <a href='/dashboard/user/new' class="btn btn-md btn-success">
                        Add New Data
                    </a>


                </div>
                <div class="bd-highlight">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">

                            {{ Breadcrumbs::render('User') }}
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nama Depan</th>
                        <th scope="col">Nama Belakang</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    ?>
                    @foreach ($data as $res)
                        <?php
                        $no++;
                        ?>
                        <tr>
                            <th scope="row">{{ $no }}</th>
                            <td>{{ $res['username'] }}</td>
                            <td>{{ $res['first_name'] }}</td>
                            <td>{{ $res['last_name'] }}</td>
                            <td>
                                <div class="d-flex">
                                    <div class="action">
                                        <button class="btn btn-md text-primary">
                                            <a href="/dashboard/user/update/{{ $res['id'] }}"><i
                                                    class="fa fa-wrench"></i> </a>
                                        </button>
                                    </div>
                            </td>
                            {{-- <td>{{$res["first_name"]}}</td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
