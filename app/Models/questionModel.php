<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questionModel extends Model
{
    use HasFactory;
    protected $table = 'tb_question';

    protected $guarded = [];
    public $timestamps = true;
}
