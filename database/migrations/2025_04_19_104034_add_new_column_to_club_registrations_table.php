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
        Schema::table('club_registrations', function (Blueprint $table) {
            $table->text('why_join')->nullable();
            $table->text('activities')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('club_registrations', function (Blueprint $table) {
            //
            $table->text('why_join')->nullable();
            $table->text('activities')->nullable();
        });
    }
};
