<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        table{
            font-size: x-small;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }
    </style>
</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"><img src="{{ public_path('/image/logonew.png')}}" width="100"/></td>
        <td align="right">
            <h3>Laporan Penilaian Responden</h3>
            <pre>
                Perpustakaan Daerah Nawaksara Kabupaten Gianyar
                Alamat : Bedulu, Blahbatuh, Kabupaten Gianyar
                {{-- Kode Pos : 80581 --}}
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <td><strong>Periode Laporan :</strong> September 2024</td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>No</th>
        <th>Tanggal & Waktu</th>
        <th colspan="2">Komentar</th>
        <th>Tampilan Jawaban</th>
      </tr>
    </thead>
    <tbody>
        @php
        $no = 0;
        $avgJawaban = 0;
        @endphp
        @foreach ($data as $res )
        @php
        $komentar="";
        $icon="";
        if($res->totalJawaban == 3){
            $komentar .= "Cukup Puas";
            $icon .="3";
        }elseif ($res->totalJawaban == 4) {
            $komentar .= "Puas";
            $icon .="4";
        }
        $avgJawaban += $res->totalJawaban
        @endphp
      <tr>
        <th scope="row">{{ $no+=1 }}</th>
        <td align="center">{{ $res->waktu }}</td>
        <td colspan="2" align="center">{{ $komentar}}</td>
        <td align="center"><img src="{{ public_path('/image/'.$icon.".png")}}" width="25"/></td>
      </tr>
      @endforeach
      @php
        $komentarAvgJawaban = "";
        $totalAvgJawaban = 0;
        $totalAvgJawaban = ceil($avgJawaban / $no);
        if ($totalAvgJawaban == 5) {
            $komentarAvgJawaban = "Sangat Puas ";
        } else if ($totalAvgJawaban == 4) {
            $komentarAvgJawaban = "Puas";
        } else if ($totalAvgJawaban == 3) {
            $komentarAvgJawaban = "Cukup Puas";
        } else if ($totalAvgJawaban == 2) {
            $komentarAvgJawaban = "Kurang Puas";
        } else{
            $komentarAvgJawaban = "Buruk";
        }
      @endphp
    </tbody>

    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total Responden :</td>
            <td align="center" class="gray">{{ $no }}</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Rata-rata Kalkulasi Responden (Rentang penilaian 1 - 5):</td>
            <td align="center">{{ ceil($totalAvgJawaban) . " (". $komentarAvgJawaban . ")"}}</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Rata-rata Kalkulasi Responden(dalam icon) :</td>
            <td align="center" class="gray"><img src="{{ public_path('/image/'.ceil($totalAvgJawaban).".png")}}" width="25"/></td>
        </tr>

    </tfoot>
  </table>
  <table>
    <tbody>
        <tr>

            <td align="right">Keterangan Penilaian :</td>
        </tr>
        <tr>

            <td align="right">5 :</td>
            <td align="left">Sangat Puas </td>
            <td align="left"><img src="{{ public_path('/image/'."5".".png")}}" width="25"/> </td>
        </tr>
        <tr>

            <td align="right">4 :</td>
            <td align="left">Puas </td>
            <td align="left"><img src="{{ public_path('/image/'."4".".png")}}" width="25"/> </td>

        </tr>
        <tr>

            <td align="right">3 :</td>
            <td align="left">Cukup Puas </td>
            <td align="left"><img src="{{ public_path('/image/'."3".".png")}}" width="25"/> </td>

        </tr>
        <tr>

            <td align="right">2 :</td>
            <td align="left">Buruk </td>
            <td align="left"><img src="{{ public_path('/image/'."2".".png")}}" width="25"/> </td>

        </tr>
        <tr>

            <td align="right">1 :</td>
            <td align="left">Sangat Buruk </td>
            <td align="left"><img src="{{ public_path('/image/'."1".".png")}}" width="25"/> </td>

        </tr>
    </tbody>
  </table>
</body>
</html>
