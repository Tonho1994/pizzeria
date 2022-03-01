<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable =  [
        'address',
        'quantity',
        'total',
        'user_id'
    ];

    //Relaciones
    //muchos a uno
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

}
