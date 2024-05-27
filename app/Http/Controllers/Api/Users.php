<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\usersModel;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Users extends Controller
{
    protected $data;
    public function __construct()
    {
        $this->data = new usersModel();
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
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $username = $request->input('username');
        $password = $request->input("password");
        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'username' => $username,
            'email' => 'info@nuansaintipersada.co.id',
            'password' => bcrypt($password),
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
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->username = $request->username;
        $data->password = Hash::make($request->password);
        $data->last_name = $request->last_name;
        $req = $data->save();
        if ($req) {
            return response()->json([
                "msg" => "Update Successfully !",
            ], 200);
        }
    }
}
