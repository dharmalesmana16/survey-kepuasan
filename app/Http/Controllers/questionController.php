<?php

namespace App\Http\Controllers;

use App\Models\groupModel;
use App\Models\questionModel;
use Illuminate\Http\Request;

class questionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $data;
    public function __construct()
    {
        $this->data = new questionModel();
    }
    public function index()
    {
        $data = [
            "title" => "Halaman Pertanyaan"
        ];
        return view("backend.question.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function new()
    {
        $dataLayanan = new groupModel();

        $data = [
            "title" => "Create Pertanyaan",
            "data" => $dataLayanan::all(),

        ];
        return view("backend.question.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(questionModel $questionModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug = null)
    {
        $data = [
            "title" => "Create Pertanyaan",
            "data" => $this->data::find($slug)->first(),

        ];
        return view("backend.question.create", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, questionModel $questionModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(questionModel $questionModel)
    {
        //
    }
}
