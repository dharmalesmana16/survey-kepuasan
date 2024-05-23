<?php

namespace App\Http\Controllers;

use App\Models\respondenModel;
use Illuminate\Http\Request;

class respondenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            "title" => "Responden"
        ];
        return view('backend.responden.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(respondenModel $respondenModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(respondenModel $respondenModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, respondenModel $respondenModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(respondenModel $respondenModel)
    {
        //
    }
}
