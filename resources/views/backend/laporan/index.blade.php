@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 ">
        <div class="card-style shadow mb-4">
            <!-- Card Header (Judul) -->
            <div class="left">
                <h6 class="text-medium mb-30">Laporan</h6>
            </div>
            <div class="card-body">
                <form id="search" action="/api/responden" method="get" class="search">
                    <input type="hidden" name="reportOpt" value="monthly">
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="p-2 bd-highlight">
                            <select name="group_id" id="group_id" class="form-control" aria-label="Default select example" >
                                <option selected value="all">Semua Pelayanan</option>
                                @foreach ($dataLayanan as $res )

                            <option value="{{ $res["id"] }}">{{ $res["nama_pelayanan"] }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="p-2 bd-highlight">

                            <input type="text" name="date" class="tanggalAwal form-control" id="tanggalAwal" required />
                        </div>
                        <div class="p-2 bd-highlight">
                            <button type="submit" id="buttonsearch" class="btn btn-md btn-primary rounded"><i
                                    class="fa-solid fa-magnifying-glass"></i> Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive" id="table-data">
                    <table class="table tableView" id="tableData">
                        <thead class="theader_target">
                            <tr class="">
                                <th scope="">No</th>
                                <th scope="">Jawaban</th>
                                <th scope="">Emoticon Jawaban</th>
                                <th scope="">Tanggal dan Waktu</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_target">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    document.addEventListener('DOMContentLoaded',function(){
        const tanggal_mulai = {
    plugins: [monthSelectPlugin({
        shorthand: false,
        dateFormat: "F Y",
        altFormat: "M Y"
    })]
};
flatpickr('.tanggalAwal', tanggal_mulai); //tambahan icon

    $(".search").submit(function(e) {
        var form = $(this);
        var serializedData = form.serialize();
        $.ajax({
            type: "get",
            url: "/api/responden",
            data: serializedData,
            dataType: "json",
            beforeSend: function() {
                $('#buttonsearch').attr('disable', 'disabled');
                // $('#buttonsearch').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('#buttonsearch').removeAttr('disable');
                $('#btnReportPDF').removeAttr('disabled');
                // datatable.button(0).enable(true);
                // datatable.button(1).enable(true);
                // datatable.clear();
                // datatable.button(0).enable(true);
                // datatable.button(1).enable(true);
                // $('#buttonsearch').html(
                //     '<i class="fa-solid fa-magnifying-glass">Search</i> ');
            },
            success: function(response) {

                        // datatable.clear();
                        // console.log(response);
                        // var no = 0;
                        // var nos = 0;
                        // let waktus = [];
                        // let data = [];
                        // $.each(datas, function(index,val) {
                        // no = no +1;
                        // console.log(val[0]);
                        // datatable.row.add([no,val[0],val[1]
                        //     ]);
                        // });
                        // datatable.draw();
            },

        });
    });
    });
</script>
<script>
let datatable = $('.tableView').DataTable({
    "searching": false,
    "responsive": true,
    "paging": true,
    "info": false,
    "autoWidth": false,
    "aLengthMenu": [25],
    "ordering": false,
    "lengthChange": false,
    "dom": 'Bftrip',
    "buttons": [
        {
            extend: 'excel',
            title: function() {
                return "MONITORING KECEPATAN ANGIN TOL BALI MANDARA";
            },
            // messageTop: function() {
            //     var lokasi = document.getElementById("datalokasi");
            //     var vallokasi = lokasi.value;
            //     var periode = document.getElementById("tanggalAwal");
            //     // var periodeAkhir = document.getElementById("tanggalAkhir");
            //     var valperiode = periode.value;
            //     // var valperiodeAkhir = periodeAkhir.value;
            //     // var periode2 = valperiode + " - " + valperiodeAkhir;
            //     var loc = "";
            //     // if (vallokasi == "data_ngurahrai") {
            //     //     loc = "NGURAH RAI";
            //     // }else if(vallokasi == "data_nusadua") {
            //     //     loc = "NUSA DUA";
            //     // }else{
            //     //     loc = "BENOA";
            //     // }
            //     // return "LOKASI : " + loc + "\nPERIODE : " + valperiode.toUpperCase();
            // },
            enabled: false,
        },
    ],
});

</script>

<script>
const tanggal_mulai = {
    plugins: [new monthSelectPlugin({
        shorthand: false,
        dateFormat: "F Y",
        altFormat: "M Y"
    })]
};

flatpickr('.tanggalAwal', tanggal_mulai);
// const tanggal_akhir = {
//     // noCalendar: true,
//     plugins: [new monthSelectPlugin({
//         shorthand: false,
//         dateFormat: "M Y",
//         altFormat: "M Y"
//     })]

//     // enableTime: true,
//     // time_24hr: true,
//     // dateFormat: "Y-m-d H:i"
// };

// flatpickr('.tanggalAkhir', tanggal_akhir);
// flatpickr('.tanggalAwal',tanggal_mulai);
//
</script>
{{-- <script src="/js/configChartReport.js"></script> --}}
@endsection
