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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('responsible_user_id');
            $table->integer('group_id');

            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('created_at');
            $table->integer('updated_at');

            $table->boolean('is_deleted');
            $table->integer('closest_task_at');
            $table->integer('account_id');
            $table->integer('company_id');

            $table->foreign('company_id')->references('id')->on('companies');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
