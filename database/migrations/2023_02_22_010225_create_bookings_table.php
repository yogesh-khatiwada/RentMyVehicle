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
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('paddress');
            $table->string('LicesencePhoto');
            $table->string('citizenship');
            $table->string('citizenshipb');
            $table->string('email');
            $table->string('phone');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('car_id');
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
