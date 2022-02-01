<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('transactionId')->nullable(); //juno = EntityId
            $table->float('amount');
            $table->text('status'); //juno = status
            $table->foreignId('users_id');
            $table->foreignId('accommodationId');
            $table->date('checkin_date');
            $table->date('checkout_date');
            $table->date('due_date')->nullable();
            $table->json('services')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
