<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    //Relaciones
    public function users()
    {
        return $this->belongsToMany(User::class, 'pedidos_por_usuario');
    }

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class, 'pizzas_por_pedido');
    }
}
