<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXmlDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site.xml_data', function (Blueprint $table) {
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
            $table -> longText("LocalizationData")->nullable();
            $table -> integer("AccommodationUnits")->nullable();
            $table -> string("Currency")->nullable();
            $table -> text("Vat")->nullable();
            $table -> longText("Features")->nullable();
            $table -> longText("CheckInCheckOutInfo")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xml_data');
    }
}
