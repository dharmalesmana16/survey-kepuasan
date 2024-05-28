<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\usersModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $data;
    public function __construct()
    {
        $this->data = new usersModel();
    }
    public function index()
    {
        $data = [
            "title" => "Manajemen User",
            "data" => $this->data::all()
        ];
        return view('backend.user.index', $data);
    }
    public function new()
    {
        $data = [
            "title" => "New User"
        ];
        return view('backend.user.create', $data);
    }
    public function edit(Request $request, $id = null)
    {
        $data = [
            "data" => $this->data::find($id)
        ];
        return view('backend.user.edit', $data);
    }
}
