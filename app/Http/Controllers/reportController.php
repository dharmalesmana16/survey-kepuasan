<?php

namespace App\Http\Controllers;

use App\Models\groupModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class reportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layananModel = new groupModel();
        $data = [
            "data" => "Laporan",
            "dataLayanan" => $layananModel::all(),
        ];
        return view('backend/laporan/index', $data);
    }
    public function download(Request $request)
    {
        // $data = "Tets";
        $pdf = Pdf::loadView('report.templatePDF');
        $pdf->setPaper('a4', 'portrait');
        return $pdf->download('laporans.pdf');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
