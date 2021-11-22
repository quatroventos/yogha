<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localizations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('AccommodationId');
            $table->text('City')->nullable();
            $table->text('Door')->nullable();
            $table->text('Block')->nullable();
            $table->text('Floor')->nullable();
            $table->text('Number')->nullable();
            $table->text('Region')->nullable();
            $table->text('Resort')->nullable();
            $table->text('Country')->nullable();
            $table->text('AreaDist')->nullable();
            $table->text('District')->nullable();
            $table->text('Locality')->nullable();
            $table->text('Province')->nullable();
            $table->text('KindOfWay')->nullable();
            $table->jsonb('GoogleMaps')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localizations');
    }
}
