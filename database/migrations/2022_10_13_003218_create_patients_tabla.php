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
        Schema::create('patients', function (Blueprint $table) {
            $table->id()->increments();
            $table->string('curp',18)->unique();
            $table->string('name_first');
            $table->string('name_last');
            $table->date('birth_date');
            $table->string('gender');
            $table->text('address');
            $table->string('phone_number',15);
            $table->string('email')->unique();
            $table->enum('state',['1','0'])->default('1');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
