<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    use HasFactory;
    protected $table = 'propietarios';
    protected  $primaryKey = 'id';
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
