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
        Schema::create('bookings', function (Blueprint $table) {
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
        Schema::dropIfExists('bookings');
    }
};
