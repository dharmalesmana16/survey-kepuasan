@extends('layouts.common')
@section('content')
    <?php
    $apiURL = collect(request()->segments())->last();
    ?>

    <div class="d-flex justify-content-center">
        <div>
            <h3 class=" text-center ask p-4 ">
                Bagaimana kepuasan anda terhadap pelayanan kami ?
            </h3>
        </div>
    </div>
    <form action="/api/responden" method="post" class="submitAnswer">
        <input type="hidden" name="idLayanan" value={{ $apiURL }}>
        <input type="hidden" name="nama" value="anon">
        <input type="hidden" name="umur" value="0">
        <div class="row row-cols-1 row-cols-md-5 g-4">
            <?php
            $data = [['nama' => 'Sangat Puas', 'icon' => '5', 'val' => 5], ['nama' => 'Puas', 'icon' => '4', 'val' => 4], ['nama' => 'Cukup Puas', 'icon' => '3', 'val' => 3], ['nama' => 'Kurang Puas', 'icon' => '2', 'val' => 2], ['nama' => 'Buruk', 'icon' => '1', 'val' => 1]];
            ?>

            @foreach ($data as $datas)
                <div class="form-group" class="clickJawaban">

                    <div class="col">

                        <label for={{ $datas['nama'] }} class="submitJawaban" style="cursor: pointer;">
                            <div class="card answerCard " style="border-radius: 40px;cursor: pointer;">
                                <div class="card-body">

                                    <div class="text-center">
                                        <input type="radio" style="visibility: hidden;" name="jawaban"
                                            id={{ $datas['nama'] }} value={{ $datas['val'] }} class="submitEmoji answers">



                                        {{-- <a href=""> --}}
                                        <img src="/image/{{ $datas['icon'] }}.png" alt="" srcset=""
                                            width="100%">
                                        <h4 class="text-muted fw-bold">
                                            {{ $datas['nama'] }}
                                        </h4>
                                    </div>
                                </div>
                        </label>
                    </div>
                </div>
        </div>
        @endforeach


        </div>
        {{-- <div class="text-center">
            <button type="submit" class="btn btn-primary btncreate">Tambah Data</button>
        </div> --}}
    </form>

    <script>
        function test() {
            console.log("Print")
        }
        $('.submitEmoji').change(function(e) {
            e.preventDefault();
            // $(".answers").prop('checked', true);

            // $('.ansCard').attr(attributeName);
            let strAnswer = "";
            // let ele = $('input[name="answer"]:checked');
            let val = $('input[name="jawaban"]:checked').val();
            if (val == 5) {
                strAnswer = "Sangat Puas"
            } else if (val == 4) {
                strAnswer = "Puas"

            } else if (val == 3) {
                strAnswer = "Cukup Puas"
            } else if (val == 2) {
                strAnswer = "Kurang Puas"
            } else {
                strAnswer = "Buruk"
            }
            Swal.fire({
                title: strAnswer,
                text: "Apakah anda yakin memilih jawaban ini ? ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Kirim',
                closeOnConfirm: false,

                closeOnCancel: false
            }).then((result) => {
                if (result.isConfirmed) {
                    test();
                    $.ajax({
                        type: 'POST',
                        url: '/api/responden',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: $('.submitAnswer').serialize(),
                        beforeSend: function() {
                            Swal.fire({
                                title: 'Please Wait !',
                                // html: '',// add html attribute if you want or remove
                                allowOutsideClick: false,
                                showCancelButton: false,
                                showConfirmButton: false,

                                onBeforeOpen: () => {
                                    Swal.showLoading()
                                },
                            });
                        },
                        success: function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'Terimakasih Atas Jawaban anda',
                                showConfirmButton: false
                            });
                            setTimeout(function() { // wait for 1 secs(2)
                                location.reload(); // then reload the page.(3)
                            }, 1000);
                        }
                    });

                }
            })
        })
    </script>
@endsection
