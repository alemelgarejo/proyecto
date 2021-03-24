<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordene extends Model
{
    use HasFactory;
    protected $table = 'ordenes';
    protected  $primaryKey = 'id';
    protected $guarded = [];


    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }
}
