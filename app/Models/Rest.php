<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','rest_start','rest_end'];

    public static $rules = array(
        'user_id' => 'required',
        'rest_start' => 'date',
        'rest_end' => 'date'
    );

}
