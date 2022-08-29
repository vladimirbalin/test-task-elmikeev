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
        Schema::create('catalog_elements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('sort');
            $table->string('type');
            $table->boolean('can_add_elements');
            $table->boolean('can_show_in_cards');
            $table->boolean('can_link_multiple');
            $table->boolean('can_be_deleted');
            $table->integer('sdk_widget_code');
            $table->integer('account_id');

            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('created_at');
            $table->integer('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalog_elements');
    }
};
