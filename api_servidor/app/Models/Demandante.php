<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demandante extends Model
{
    use HasFactory;
    public $table='demandantes';
    protected $fillable = [
        'name',
        'email',
        'edad'
    ];
    public function prestaciones(){
        return $this->belongsToMany(Prestacion::class,'demandantes_prestacion');
    }
}
