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
        Schema::create('guards', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('birthdate')->nullable();
            $table->string('sex', 1)->nullable();
            $table->string('address', 150);
            $table->string('nbi_clearance_id', 21);
            $table->string('phone_number', 11);
            $table->integer('educational_attainment');
            $table->string('lesp_id');
            $table->string('sss', 14);
            $table->date('agency_affiliation_date');
            $table->date('nbi_issued_date');
            $table->softDeletes();
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
        Schema::dropIfExists('guards');
    }
};
