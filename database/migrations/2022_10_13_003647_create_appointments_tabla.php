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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            //$table->string('doctor',18);
            $table->date('date');
            $table->time('time');
            $table->foreignId('doctor_id')->constrained('doctors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('patient_id')->constrained('patients')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('state',['1','0'])->default('1');
            //$table->foreignId('recepcionist_id')->constrained('receptionists')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreign('doctor')->references('curp')->on('doctors');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('appointments');
    }
};
