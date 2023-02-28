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
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();
            $table->string('bikeName');
            $table->string('image')->nullable();
            $table->string('model');
            $table->string('quantity');
            $table->string('prize');
            $table->string('date');
            $table->string('day');
            $table->string('added');
            $table->enum('status', ['available', 'notavailable'])->default('available');
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
        Schema::dropIfExists('bikes');
    }
};
