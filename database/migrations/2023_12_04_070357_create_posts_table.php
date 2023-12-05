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
        Schema::create('posts', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->constrained('users');
            $table->longText('content')->nullable();
            $table->integer('total_likes')->nullable();
            $table->integer('total_comments')->nullable();
            $table->integer('total_shares')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('posts');
    }
};
