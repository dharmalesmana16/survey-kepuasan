<?php

namespace App\Http\Controllers;

use App\Models\groupModel;
use App\Models\videoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class videoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $data;
    public function __construct()
    {
        $this->data = new videoModel();
    }
    public function index()
    {
        $data = [
            "data" => $this->data::all(),
        ];
        return view('backend/video/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function new ()
    {
        $data = [
            "title" => "Create Video",
        ];
        return view('backend/video/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(groupModel $groupModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(groupModel $groupModel)
    {
        $data = [
            "title" => "Update Layanan",
            "res" => $this->data->getData(1),

        ];
        return view("backend/video/edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $this->data::find($id);
        $data->id = $request->id;
        $data->judul_video = $request->judul_video;
        if ($request->file_video) {
            $videoName = time() . "-" . $data->judul_video . "." . $request->file('file_video')->getClientOriginalExtension();
            $data->file_video = $videoName;
        }
        // $data->icon = $request->icon;
        $req = $data->save();
        if ($req) {
            return response()->json([
                "msg" => "Update Successfully !",
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(groupModel $groupModel)
    {
        //
    }
}
