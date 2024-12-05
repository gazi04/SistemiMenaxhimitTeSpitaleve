<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_id', 10)->unique();
            $table->string('personal_id', 10)->unique();
            $table->unsignedBigInteger('departament_id');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('phone_number', 15)->unique();
            $table->string('email', 50)->unique();
            $table->timestamps();

            $table->foreign('departament_id')->references('id')->on('departaments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
