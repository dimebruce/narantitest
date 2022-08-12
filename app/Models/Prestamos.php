<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamos extends Model
{
    use HasFactory;

    protected $table = "prestamos";

    protected $fillable = [

        'id_socio',
        'id_user',
        'fecha',
        'estado',
        'total'

    ];

    public $timestamps = false;

    public function SOCIO(){
        return $this->belongsTo(Socios::class, 'id_socio');
    }
    public function ADMINISTRADOR(){
        return $this->belongsTo(User::class, 'id_user');
    }
    
}
