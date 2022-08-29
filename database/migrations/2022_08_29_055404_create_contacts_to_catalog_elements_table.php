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
        Schema::create('contacts_to_catalog_elements', function (Blueprint $table) {
            $table->integer('catalog_element_id');
            $table->integer('contact_id');

            $table->foreign('catalog_element_id')->references('id')->on('catalog_elements');
            $table->foreign('contact_id')->references('id')->on('contacts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts_to_catalog_elements');
    }
};
