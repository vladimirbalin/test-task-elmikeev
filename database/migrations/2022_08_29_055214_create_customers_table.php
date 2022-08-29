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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('next_price');
            $table->integer('next_date');
            $table->integer('responsible_user_id');
            $table->integer('periodicity');
            $table->integer('closest_task_at');
            $table->boolean('is_deleted');
            $table->integer('ltv');
            $table->integer('purchases_count');
            $table->integer('average_check');
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
        Schema::dropIfExists('customers');
    }
};
