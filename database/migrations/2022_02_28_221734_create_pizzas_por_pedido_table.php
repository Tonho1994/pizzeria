<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzasPorPedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizzas_por_pedido', function (Blueprint $table) {
            $table->id();
            /* $table->foreign('pizza_id')->references('id')->on('pizzas');
            $table->foreign('pedido_id')->references('id')->on('pedidos'); */
            $table->foreignId('pizza_id')->constrained();
            $table->foreignId('pedido_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizzas_por_pedido');
    }
}
