<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShelvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site.shelves', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table -> text("title");
            $table -> integer("position");
            $table -> integer("limit"); //limite de anúncios na prateleira
            $table -> foreignId("shelfLayoutId");
            $table -> foreignId("shelfFilterId");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shelves');
    }
}
