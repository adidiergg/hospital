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
        
            $table->id()->increments();
            $table->string('curp',18);
            $table->string('name_first');
            $table->string('name_last');
            $table->date('birth_date');
            $table->enum('gender',['masculino','femenino']);
            $table->text('address');
            $table->string('phone_number',15);
            $table->string('email')->unique();
            $table->date('hire_date');
            $table->string('password');
            $table->enum('role',['administrador','doctor','recepcionista']);
            //$table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
