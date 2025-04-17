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
        Schema::create('club_registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('club_name')->unique();
            $table->text('club_description');
            $table->string('club_logo')->nullable();
            $table->string('club_email')->unique();
            $table->string('club_advisor');
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('SET NULL');
            $table->index('created_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('club_registrations');
    }
};
