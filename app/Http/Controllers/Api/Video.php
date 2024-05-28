<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\groupModel;
use App\Models\videoModel;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Video extends Controller
{
    protected $data;
    public function __construct()
    {
        $this->data = new videoModel();
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
        $judul_video = $request->input("judul_video");

        $videoName = time() . "-" . $judul_video . "." . $request->file('file_video')->getClientOriginalExtension();
        Storage::disk('public')->put($videoName, file_get_contents($request->file_video));

        $data = [
            'judul_video' => $judul_video,
            'file_video' => $videoName,
            // 'slug' => Str::slug($judul_video),
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
        $data->judul_video = $request->judul_video;
        // $data->icon = $request->icon;
        $req = $data->save();
        if ($req) {
            return response()->json([
                "msg" => "Update Successfully !",
            ], 200);
        }
    }
}
