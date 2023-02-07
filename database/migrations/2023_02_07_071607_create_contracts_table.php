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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id('contracts_id');
            $table->date('start_date')->nullable();
            $table->integer('years')->nullable();
            $table->integer('months')->nullable();
            $table->tinyInteger('is_finished');
            $table->string('link')->nullable();
            $table->foreign('users')->references('users_id')->on('users')->onDelete('cascade');
            $table->date('issued_date');
            $table->double('daily_wage',15,2)->nullable();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
};
