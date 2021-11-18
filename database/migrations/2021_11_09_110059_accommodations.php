<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Accommodations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table -> integer("AccommodationId")->nullable();
            $table -> integer("UserId")->nullable();
            $table -> integer("CompanyId")->nullable();
            $table -> string("AccommodationName")->nullable();
            $table -> integer("IdGallery")->nullable();
            $table -> integer("OccupationalRuleId")->nullable();
            $table -> integer("PriceModifierId")->nullable();
            $table -> string("Purpose")->nullable();
            $table -> string("UserKind")->nullable();
            $table -> jsonb("LocalizationData")->nullable();
            $table -> integer("AccommodationUnits")->nullable();
            $table -> string("Currency")->nullable();
            $table -> text("Vat")->nullable();
            $table -> jsonb("Features")->nullable();
            $table -> jsonb("CheckInCheckOutInfo")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
