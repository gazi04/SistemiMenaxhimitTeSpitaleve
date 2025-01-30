<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->unsignedBigInteger('therapy_id')->nullable()->after('doctor_id');
            $table->unsignedBigInteger('diagnoses_id')->nullable()->after('doctor_id');
        });

        DB::table('appointments')->update([
            'therapy_id' => null,
            'diagnoses_id' => null
        ]);

        Schema::table('appointments', function (Blueprint $table) {
            $table->foreign('diagnoses_id')->references('id')->on('diagnoses')->onDelete('cascade');
            $table->foreign('therapy_id')->references('id')->on('therapies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign(['diagnoses_id']);
            $table->dropForeign(['therapy_id']);
            $table->dropColumn(['diagnoses_id', 'therapy_id']);
        });
    }
};
