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
        Schema::table('admins', function (Blueprint $table) {
            $table->boolean('is_employed')->default(true)->after('email');
        });
        Schema::table('doctors', function (Blueprint $table) {
            $table->boolean('is_employed')->default(true)->after('email');
        });
        Schema::table('nurses', function (Blueprint $table) {
            $table->boolean('is_employed')->default(true)->after('email');
        });
        Schema::table('receptionists', function (Blueprint $table) {
            $table->boolean('is_employed')->default(true)->after('email');
        });
        Schema::table('technologists', function (Blueprint $table) {
            $table->boolean('is_employed')->default(true)->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('is_employed');
        });
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn('is_employed');
        });
        Schema::table('nurses', function (Blueprint $table) {
            $table->dropColumn('is_employed');
        });
        Schema::table('receptionists', function (Blueprint $table) {
            $table->dropColumn('is_employed');
        });
        Schema::table('technologists', function (Blueprint $table) {
            $table->dropColumn('is_employed');
        });
    }
};
