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
        Schema::create('designations', function (Blueprint $table) {
            $table->id();
            $table->integer('designation_type')->nullable();
            $table->integer('day_off_day')->nullable();
            $table->unsignedBigInteger('ddo_id');
            $table->unsignedBigInteger('guard_id');
            $table->unsignedBigInteger('firearm_id');
            $table->unsignedBigInteger('post_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            // $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('firearm_id')->references('id')->on('firearms')->onDelete('cascade');
            $table->foreign('guard_id')->references('id')->on('guards')->onDelete('cascade');
            $table->foreign('ddo_id')->references('id')->on('ddos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('designations');
    }
};
