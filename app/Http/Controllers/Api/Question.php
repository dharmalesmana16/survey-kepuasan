<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\questionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Question extends Controller
{
    protected $data;
    public function __construct()
    {
        $this->data = new questionModel();
    }
    public function index()
    {
        $data = $this->data::all();
        if ($data) {
            return response()->json([
                "data" => $data
            ]);
        } else {
            return response()->json([
                "msg" => "no data"
            ]);
        }
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
        $judul_pertanyaan = $request->input("judul_pertanyaan");

        $data = [
            'judul_pertanyaan' => $judul_pertanyaan,
            'slug' => Str::slug($judul_pertanyaan),
            'group_id' => $request->input('group_id'),
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
