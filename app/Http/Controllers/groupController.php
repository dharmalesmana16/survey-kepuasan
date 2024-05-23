<?php

namespace App\Http\Controllers;

use App\Models\groupModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class groupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $data;
    public function __construct()
    {
        $this->data = new groupModel();
    }
    public function index()
    {
        $data = [
            "data" => $this->data::all()
        ];
        return view('backend/layanan/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function new()
    {
        $data = [
            "title" => "Create Layanan"
        ];
        return view('backend/layanan/create', $data);
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
            "title" => "Update Layanan"

        ];
        return view("backend/layanan/update", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, groupModel $groupModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(groupModel $groupModel)
    {
        //
    }
}
