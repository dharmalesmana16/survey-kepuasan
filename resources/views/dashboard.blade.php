@extends('layouts.app')
@section('content')
    <div class="card-style p-4 pb-0 mb-3">
        <div class="card-body">


            <div class="d-flex justify-content-between">
                <div class="bd-highlight">
                    <h4 class="fw-bold ">Data per hari ini</h4>



                </div>
                <div class="bd-highlight">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">

                            {{ Breadcrumbs::render('home') }}
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="card-style">
                    <h6 class="fw-bold">
                        Total Jawaban
                    </h6>
                    <div class="card-body text-center align-items-center align-content-center p-3">
                        <h5 class="display-5 fw-bold pt-3" id="ansToday">100</h5>
                        <p class="fs-5 fw-light"> Jawaban</p>
                    </div>
                </div>
                <div class="card-style">
                    <h6 class="fw-bold">
                        Tampilan Jawaban
                    </h6>
                    <div class="card-body text-center align-items-center align-content-center ">
                        <img src="/image/5.png" alt="" srcset="" width="150">
                        <p class="fs-5 fw-light"> Sangat Puas</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="card-style" style="width:100%; height:100%;">
                    <div id="pieChart"></div>

                </div>
            </div>
        </div>
    </section>

    <section class="py-3">
        <div class="card-style">
            <div class="card-body">
                <div id="barChart" style="width:100%; height:400px;"></div>
            </div>
        </div>
    </section>
@endsection
