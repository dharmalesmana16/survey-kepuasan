@extends('layouts.app')
@section('content')
    <div class="card-style p-4 pb-0 mb-3">
        <div class="card-body">


            <div class="d-flex justify-content-between">
                <div class="bd-highlight">

                    <h4 class="fw-bold ">Data Responden</h4>




                </div>
                <div class="bd-highlight">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">

                            {{ Breadcrumbs::render('Responden') }}
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card-style p-2 mb-3">
        <div class="card-body">
            <form action="/api/responden" method="post" class="search">
                @csrf
                <input type="hidden" name="grouping" value="true">
                <div class="d-flex justify-content-end align-content-center align-items-center text-end">
                    <div class="p-2 bd-highlight">
                        <input type="text" name="tanggalAwal" class="tanggalAwal form-control" id="tanggalAwal"
                            required />
                    </div>
                    <div class="p-2 bd-highlight">
                        <input type="text" name="tanggalAkhir" class="tanggalAkhir form-control" id="tanggalAkhir"
                            required />
                    </div>
                    <button type="submit" id="buttonsearch" class="btn btn-md btn-primary rounded"><i
                            class="fa-solid fa-magnifying-glass"></i> Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card-style">
        <h6 class="mb-10" id="root">Pertanyaan</h6>

        <p class="text-sm mb-20">
        </p>

        <div class="table-responsive">
            <table class="table table-hover devices">
                <thead>
                    <tr class="" style="">
                        <th scope="" style="">No</th>
                        <th scope="" style="">Responden</th>
                        {{-- <th scope="" style="">Alamat IP</th> --}}
                        <th scope="" style="">Jawaban</th>
                        <th scope="" style="">Jam</th>
                    </tr>
                </thead>


            </table>


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
                        <h5 class="display-5 fw-bold pt-3" id="ansToday">-</h5>
                        <p class="fs-5 fw-light"> Jawaban</p>
                    </div>
                </div>
                <div class="card-style">
                    <h6 class="fw-bold">
                        Tampilan Jawaban
                    </h6>
                    <div class="card-body text-center align-items-center align-content-center ">
                        <img src="/image/5.png" alt="" srcset="" width="150" id="tampilanAnswer">
                        <p class="fs-5 fw-light" id="textTampilanAnswer">-</p>
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
    <script></script>
@endsection
