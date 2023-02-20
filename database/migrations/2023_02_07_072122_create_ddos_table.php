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
            $table->dateTime('date_issued')->nullable();
            $table->date('start_date')->nullable();
            $table->string('operations_manager');
            $table->integer('validity');
            $table->string('link')->nullable();
            $table->tinyInteger('is_finished');
            $table->unsignedBigInteger('contract_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
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
