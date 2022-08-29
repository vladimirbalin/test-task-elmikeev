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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('responsible_user_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('closest_task_at')->nullable();
            $table->integer('account_id')->nullable();

            $table->integer('created_by')->nullable();
            $table->integer('created_at')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
