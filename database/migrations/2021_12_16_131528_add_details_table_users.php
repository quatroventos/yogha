<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('surname')->nullable();
            $table->text('phone')->nullable();
            $table->date('birthday')->nullable();
            $table->text('cpf')->nullable();
            $table->text('country')->nullable();
            $table->text('estate')->nullable();
            $table->text('city')->nullable();
            $table->text('district')->nullable();
            $table->text('zip_code')->nullable();
            $table->text('street')->nullable();
            $table->text('number')->nullable();
            $table->text('complement')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
