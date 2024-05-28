<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class videoModel extends Model
{
    use HasFactory;
    public $table = "tb_video";
    protected $guarded = [];
    public $timestamps = true;
}
