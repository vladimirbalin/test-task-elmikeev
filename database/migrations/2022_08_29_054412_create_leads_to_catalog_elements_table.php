<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads_to_catalog_elements', function (Blueprint $table) {
            $table->integer('lead_id');
            $table->integer('catalog_element_id');

            $table->foreign('lead_id')->references('id')->on('leads');
            $table->foreign('catalog_element_id')->references('id')->on('catalog_elements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads_to_catalog_elements');
    }
};
