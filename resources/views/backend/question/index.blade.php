@extends('layouts.app')
@section('content')
    <div class="card-style">
        <h6 class="mb-10" id="root">Pertanyaan</h6>

        <p class="text-sm mb-20">
        </p>

        <div class="table-responsive">
            <table class="table table-hover devices">
                <thead>
                    <tr class="" style="">
                        <th scope="" style="">No</th>
                        <th scope="" style="">Pertanyaan</th>
                        {{-- <th scope="" style="">Alamat IP</th> --}}
                        <th scope="" style="">Manajemen</th>
                    </tr>
                </thead>


            </table>
            <a class="main-btn primary-btn btn-hover createdevice" href="/devices/new" role="button">Tambah Perangkat
                Baru</a>

        </div>

    </div>
    <div class="viewmodal" style="display: none;"></div>

    <script>
        $(document).ready(function() {
            let dataDevice = $('.devices').DataTable({
                "searching": false,
                "responsive": true,
                "paging": true,
                "info": false,
                "autoWidth": false,
                "aLengthMenu": [25],
                "lengthChange": false,
                "ordering": false,
                "ajax": '/api/question',
                "columns": [{
                        "data": "id",
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;

                        }
                    },
                    {
                        "data": "judul_pertanyaan"
                    },

                    {
                        "data": "meta",
                        render: function(data, type, row, meta) {
                            return `<div class="d-flex"> <div class="action"> <button class="btn btn-md text-primary"> <a href="/devices/update/${data}"><i class="fa fa-wrench"></i>  </a> </button>  </div>`
                            // return  data

                        }

                    }

                ]
            });
        })

        // $(function () {
        //     let no =0
        //     $.ajax({
        //         type: "get",
        //         url: "/api/device",
        //         data: "data",
        //         dataType: "json",
        //         success: function (response) {
        //             // console.log(response["data"][0]["nama"])

        //             $.each(response, function (index,val) {
        //                 let no = index + 1
        //                 $.each(val, function (indexs,valSecond) {
        //                     // console.log(valSecond.nama)
        //                     dataDevice.row.add([no,valSecond.nama,no,no]);
        //                 });
        //             });
        //         }
        //     });
        // });

        $('.createdevice').click(function() {
            window.location = '/devices/new'
        })
        $('.btnshow').submit(function(e) {
            e.preventDefault();
            var ids = $(this).data('id')
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: {
                    id: ids
                },
                dataType: "json",
                success: function(response) {
                    $('.viewmodal').html(response.data).show();
                    $('#device_detail').modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + xhr.responseText + thrownError);
                }
            });
        })
        $('.deletedevice').submit(function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda Yakin ?',
                text: "Anda tidak bisa Mengulangi data ini lagi !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus Data',
                closeOnConfirm: false,

                closeOnCancel: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: $(this).attr('action'),
                        data: {
                            id: id
                        },
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
                                title: 'Delete Device Successfully !',
                                showConfirmButton: false
                            });
                            setTimeout(function() { // wait for 1 secs(2)
                                location.reload(); // then reload the page.(3)
                            }, 1000);
                        }
                    });

                } else {
                    Swal.fire(
                        'Cancelled',
                        '',
                        'error'
                    )
                }
            })
        })
    </script>
@endsection
