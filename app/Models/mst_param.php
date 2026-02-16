<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mst_param extends Model
{
    protected $fillable = [
        'id',
        'param_name',
        'param_value',
        'param_desc',
        'param_low_value',
        'param_high_value',
    ];
    
    protected $table = 'mst_params';
}
