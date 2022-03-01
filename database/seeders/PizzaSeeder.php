<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pizza;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $array=array(1=>['name'=>'Hawaiana','ingredients'=>'Jamon, Piña y Queso Mozzarela','price'=>'220.00','foto'=>'hawaiana.jpg'],
            2=>['name'=>'Mexicana','ingredients'=>'Chorizo, Carne Molida, Pimiento Verde, Cebolla y Jalapeño','price'=>'245.00','foto'=>'mexicana.jpg'],
            3=>['name'=>'CuatroQuesos','ingredients'=>'Queso Parmesano, Queso Gouda, Queso Crema, Queso Mozzarella','price'=>'199.99','foto'=>'4_quesos.jpg'],
            4=>['name'=>'Margarita','ingredients'=>'Queso Mozzarella, Queso Crema, Tomillo, Albahaca y Peperoni','price'=>'159.00','foto'=>'margareta.jpg']);
        foreach ($array as $key => $value) {
            $pizzas = Pizza::create([
                'id' => $key,
                'name' => $value['name'],
                'ingredients' => $value['ingredients'],
                'foto' => $value['foto'],
                'price' => $value['price']
            ]);
            $pizzas->save;
        }
    }
}
