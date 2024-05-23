<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\groupModel;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Layanan extends Controller
{
    protected $data;
    public function __construct()
    {
        $this->data = new groupModel();
    }
    public function index()
    {
        $data = $this->data::all();
        if ($data) {
            return response()->json($data);
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
        $nama_layanan = $request->input("nama_layanan");

        $iconName = time() . "-" . $nama_layanan . "." . $request->file('icon')->getClientOriginalExtension();
        Storage::disk('public')->put($iconName, file_get_contents($request->icon));

        $data = [
            'nama_pelayanan' => $nama_layanan,
            'icon' => $iconName,
            'slug' => Str::slug($nama_layanan),
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
        $data->icon = $request->icon;
        $req = $data->save();
        if ($req) {
            return response()->json([
                "msg" => "Update Successfully !",
            ], 200);
        }
    }
}
