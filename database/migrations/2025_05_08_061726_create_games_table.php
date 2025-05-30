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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('game_id')->unique();
            $table->string('name');
            $table->foreignId('game_category_id')->constrained()->onDelete('cascade');
            $table->unsignedInteger('number_of_players');
            $table->unsignedInteger('number_of_questions');
            $table->boolean('is_premium')->default(false);
            $table->decimal('amount', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
