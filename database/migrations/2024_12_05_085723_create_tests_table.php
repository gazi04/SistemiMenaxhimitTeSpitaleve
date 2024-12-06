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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('technologist_id');
            $table->string('test_type', 100);
            # TODO: find how to store the results of a test
            $table->string('results');
            $table->dateTime('create_at');

            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('technologist_id')->references('id')->on('technologists');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
