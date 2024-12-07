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
        Schema::create('nurses', function (Blueprint $table) {
            $table->id();
            $table->string('id_number', 10)->unique();
            $table->string('personal_id', 10)->unique();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('phone_number', 15)->unique();
            # TODO: find a solution for the head nurse
            # only one nurse can be head nurse in the whole table
            $table->string('email', 50)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nurses');
    }
};
