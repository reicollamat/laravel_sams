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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_admin')->default(false);
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('phone_number')->unique();
            $table->date('birth_date');
            $table->string('organiztion_address');
            $table->string('organiztion_name');
            $table->string('sex',1);
            $table->string('position');
            $table->rememberToken();
            $table->dateTime('date_joined');
            $table->dateTime('last_login');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
