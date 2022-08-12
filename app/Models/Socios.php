<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socios extends Model
{
    use HasFactory;

    protected $table = "socios";

    protected $fillable = [

        'name',
        'address'
    ];

    public $timestamps = false;
}
