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
            $data = DB::table('tb_responden')->selectRaw("nama,jawaban")->whereRaw('date(created_at) = CURRENT_DATE()')->orderByDesc('jawaban')->get();
            return response()->json([
                "data" => $data
            ]);
        } else if ($grouping == "yes") {
            $data = DB::table('tb_responden')->selectRaw("jawaban,count(jawaban) as totalGrouping")->whereRaw("date(created_at) = CURRENT_DATE()")
                ->groupBy("jawaban")->orderByDesc("jawaban")->get();
            return response()->json([
                "data" => $data
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
        $dataLayanan = new groupModel();
        $group_id = $request->input('idLayanan');
        $idLayanan = $dataLayanan::where('nama_pelayanan', $group_id)->first();
        $jawaban = $request->input('jawaban');
        $nama = $request->input('nama');
        $umur = $request->input('umur');
        $komentar = $request->input("komentar");
        $data = [
            'nama' => $nama,
            'jawaban' => $jawaban,
            'komentar' => $komentar,
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
