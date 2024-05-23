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
@endsection
