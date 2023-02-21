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
        Schema::create('ddos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('approved_date')->nullable();
            $table->date('start_date')->nullable();
            $table->string('operations_manager');
            $table->tinyInteger('is_finished')->nullable();
            $table->unsignedBigInteger('contract_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ddos');
    }
};
