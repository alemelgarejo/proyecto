<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedade extends Model
{
    use HasFactory;
    protected $table = 'propiedades';
    //protected  $primaryKey = 'id';
    protected $guarded = [];

    public function propietario() {
        return $this->belongsTo(Propietario::class);
    }
}
