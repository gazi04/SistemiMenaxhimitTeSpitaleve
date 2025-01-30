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
        Schema::table('appointments', function (Blueprint $table) {
            $table->dateTime('start_time')->after('doctor_id');
            $table->dateTime('end_time')->after('start_time');
            $table->dropColumn('appointment_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dateTime('appointment_date')->after('doctor_id');
            $table->dropColumn(['start_time', 'end_time']);
        });
    }
};
