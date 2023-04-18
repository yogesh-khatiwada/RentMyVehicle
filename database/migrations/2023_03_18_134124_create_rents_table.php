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
            $table->string('name')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
           
           
            // $table->enum('status',['booking','rent'])->default('booking');
          
      
            $table->string('address')->nullable();
            $table->string('paddress')->nullable();
            // $table->string('paddress')->nullable();
            $table->string('resume')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('citizenshipb')->nullable();
            // $table->string('email')->nullable();
            $table->string('totalprice');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('car_id')->nullable();

            $table->enum('paymentstatus',['complete','incomplete']);
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
