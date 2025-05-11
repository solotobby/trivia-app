<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->enum('status', ['pending', 'active', 'completed', 'suspended'])->default('pending')->after('amount');
            $table->unsignedBigInteger('created_by')->nullable()->after('status');
            $table->integer('duration_in_minutes')->nullable()->after('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn(['status', 'created_by', 'duration_in_minutes']);
        });
    }
};
