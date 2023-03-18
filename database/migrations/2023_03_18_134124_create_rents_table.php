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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('age');
            $table->string('taddress');
            $table->string('paddress');
            $table->string('cpf');
            $table->string('cpb');
            $table->string('lp');
            $table->enum('status',['booking','rent'])->default('booking');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('paddress')->nullable();
            $table->string('resume')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('citizenshipb')->nullable();
            $table->string('email')->nullable();
            $table->integer('phone')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('car_id')->nullable();
            $table->enum('status',['pending','accepted','cancel'])->default('pending');
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
        Schema::dropIfExists('rents');
    }
};
