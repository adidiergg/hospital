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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id()->increments();
            $table->string('curp',18)->unique();
            $table->string('name_first');
            $table->string('name_last');
            $table->date('birth_date');
            $table->enum('gender',['Masculino','Femenino']);
            $table->text('address');
            $table->string('phone_number',15);
            $table->string('email')->unique();
            $table->date('hire_date');
            $table->string('password');
            $table->string('license');
            $table->string('speciality');
            $table->enum('state',['1','0'])->default('1');
            //$table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
};
