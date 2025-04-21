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
        Schema::table('club_announcements', function (Blueprint $table) {
            $table->foreignId('club_id')->nullable()->constrained('club_registrations')->onDelete('set null')->before('title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('club_announcements', function (Blueprint $table) {
            //
        });
    }
};
