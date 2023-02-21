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
            $table->id();
            $table->date('start_date')->nullable();
            $table->integer('years')->nullable();
            $table->date('end_date')->nullable();
            $table->tinyInteger('is_finished')->nullable();
            $table->tinyInteger('number_of_guards')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->date('issued_date');
            $table->double('daily_wage',15,2)->nullable();
            $table->integer('status');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
