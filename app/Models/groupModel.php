<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groupModel extends Model
{
    use HasFactory;
    protected $table = 'tb_group';
    protected $guarded = [];
    public $timestamps = true;
    public function getData($id = false)
    {
        if ($id === false) {
            return $this::all();
        } else {
            return $this->where("id", $id)->first();
        }
    }
}
