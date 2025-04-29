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
            $table->timestamp('declined_at')->nullable()->after('role');
            $table->text('decline_reason')->nullable()->after('declined_at');
            $table->timestamp('withdrawn_at')->nullable()->after('decline_reason');
            $table->text('withdrawn_reason')->nullable()->after('withdrawn_at');
            $table->foreignId('actioned_by')->nullable()->constrained('users')->onDelete('set null')->after('withdrawn_reason');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('club_members', function (Blueprint $table) {
            $table->dropColumn('declined_at');
            $table->dropColumn('decline_reason');
            $table->dropColumn('withdrawn_at');
            $table->dropColumn('withdrawn_reason');
            $table->dropForeign(['actioned_by']);
            $table->dropColumn('actioned_by');
        });
    }
};
