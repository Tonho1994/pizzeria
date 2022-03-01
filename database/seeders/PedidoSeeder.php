<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $pedido= Pedido::create([
            'id' => 1,
            'address' => 'Calle imaginaria #1 col inexistente CDMX, Iztacalco CP 00000',
            'quantity' => 465,
            'total' => (465*.21)+465,
            'user_id' => 1
        ]);
        $pedido->save;
    }
}
