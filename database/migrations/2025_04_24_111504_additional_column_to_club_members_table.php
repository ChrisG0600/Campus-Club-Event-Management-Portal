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
        Schema::table('club_members', function (Blueprint $table) {
            $table->enum('status', ['pending', 'approved', 'rejected', 'withdrawn', 'declined'])->change();
            $table->unsignedInteger('resubmission_count')->default(0)->after('status');
            $table->boolean('can_resubmit')->default(true)->after('resubmission_count');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('club_members', function (Blueprint $table) {
            $table->enum('status', ['pending', 'approved', 'rejected', 'withdrawn'])->change();
            $table->dropColumn('resubmission_count');
            $table->dropColumn('can_resubmit');
        });
    }
};
