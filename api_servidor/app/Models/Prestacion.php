<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestacion extends Model
{
    use HasFactory;
    public $table='prestaciones';
    protected $fillable = [
        'name',
        'cuantia'
    ];
    public function demandantes(){
        return $this->belongsToMany(Demandante::class,'demandantes_prestacion');
    }
}
