<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('headerimage')->nullable();
            $table->string('shelf1_title')->nullable();
            $table->string('shelf1_content')->nullable();
            $table->string('shelf2_title')->nullable();
            $table->string('shelf2_content')->nullable();
            $table->string('shelf3_title')->nullable();
            $table->string('shelf3_content')->nullable();
            $table->string('shelf4_title')->nullable();
            $table->string('shelf4_content')->nullable();
            $table->string('shelf5_title')->nullable();
            $table->string('shelf5_content')->nullable();
            $table->string('banner_title')->nullable();
            $table->string('banner_text')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('banner_link')->nullable();
            $table->string('banner_cta')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homes');
    }
}
