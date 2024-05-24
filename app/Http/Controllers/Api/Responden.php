<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\groupModel;
use App\Models\respondenModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Responden extends Controller
{
    protected $data;
    public function __construct()
    {
        $this->data = new respondenModel();
    }
    public function index(Request $request)
    {
        $startDate = $request->input("startDate");
        $grouping = $request->input("grouping");
        $tanggalAwal = $request->input('tanggalAwal');
        $tanggalAkhir = $request->input("tanggalAkhir");
        // $endDate = $request->input("endDate");
        // if ($startDate != null && $endDate != null){

        // }
        if ($startDate == "today") {
            $data = DB::table('tb_responden')->selectRaw("komentar,jawaban")->whereRaw('date(created_at) = CURRENT_DATE()')->orderByDesc('jawaban')->get();
            return response()->json([
                "data" => $data
            ]);
        } else if ($grouping == "yes") {
            $data = [
                "5" => 0,
                "4" => 0,
                "3" => 0,
                "2" => 0,
                "1" => 0,
            ];
            $data = DB::table('tb_responden')->selectRaw("jawaban,count(jawaban) as totalGrouping")->whereRaw("date(created_at) = CURRENT_DATE()")
                ->groupBy("jawaban")->orderByDesc("jawaban")->get();

            return response()->json([
                "data" =>  $data
            ]);
            // return $data;
        } else if ($tanggalAwal != null && $tanggalAkhir != null && $grouping == "true") {
            $data = DB::table("tb_responden")->selectRaw("jawaban")->whereRaw("created_at between
            '$tanggalAwal' and '$tanggalAkhir'")->get();
            $grouping = DB::table('tb_responden')->selectRaw("count(jawaban) as totalGrouping")->whereRaw("created_at between
            '$tanggalAwal' and '$tanggalAkhir'")
                ->groupBy("jawaban")->orderByDesc("jawaban")->get();
            return response()->json([
                "data" => $data,
                "grouping" => $grouping
            ]);
        }

        // $data = $this->data::all();
        // if ($data) {
        //     return response()->json([
        //         "data" => $data
        //     ]);
        // } else {
        //     return response()->json([
        //         "msg" => "no data"
        //     ]);
        // }
    }
    public function show($id = null)
    {
        $data = $this->data::find($id)->first();
        if ($data) {
            return response()->json($data);
        } else {
            return response()->json([
                "msg" => "no data"
            ]);
        }
    }
    public function store(Request $request)
    {
        $dataAnswer = ["Sangat Puas", "Puas", "Cukup Puas", "Kurang Puas", "Buruk"];

        $dataLayanan = new groupModel();
        $group_id = $request->input('idLayanan');
        $idLayanan = $dataLayanan::where('nama_pelayanan', $group_id)->first();
        $jawaban = $request->input('jawaban');
        $jawabanA = 0;
        $jawabanB = 0;
        $jawabanC = 0;
        $jawabanD = 0;
        $jawabanE = 0;
        $nama = $request->input('nama');
        $umur = $request->input('umur');
        $komentar = "";
        if ($jawaban == 5) {
            $komentar = $dataAnswer[0];
            $jawabanA = 1;
        } else if ($jawaban == 4) {
            $komentar = $dataAnswer[1];
            $jawabanB = 1;
        } else if ($jawaban == 3) {
            $komentar = $dataAnswer[2];
            $jawabanC = 1;
        } else if ($jawaban == 2) {
            $komentar = $dataAnswer[3];
            $jawabanD = 1;
        } else {
            $komentar = $dataAnswer[4];
            $jawabanE = 1;
        }
        $data = [
            'nama' => $nama,
            'jawaban' => $jawaban,
            'komentar' => $komentar,
            "A" => $jawabanA,
            "B" => $jawabanB,
            "C" => $jawabanC,
            "D" => $jawabanD,
            "E" => $jawabanE,
            'group_id' => $idLayanan->id,
            'umur' => $umur,
        ];
        $resp = $this->data->create($data);
        if ($resp) {

            return response()->json([
                "msg" => "success"
            ], 201);
        }
    }
    public function update(Request $request, $id)
    {
        $data = $this->data::find($id);
        $data->id = $request->id;
        $data->nama_layanan = $request->nama_layanan;
        $data->group_id = $request->group_id;
        $req = $data->save();
        if ($req) {
            return response()->json([
                "msg" => "Update Successfully !",
            ], 200);
        }
    }
}
