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
            $table->string('student_number')->after('student_id'); 
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending')->after('student_number');
            $table->string('reject_message')->nullable()->after('status'); 
            $table->text('why_interested')->nullable()->after('reject_message');
            $table->text('experience')->nullable()->after('why_interested');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('club_members', function (Blueprint $table) {
            $table->dropColumn(['student_number', 'status', 'reject_message', 'why_interested', 'experience']);
        });
    }
};
