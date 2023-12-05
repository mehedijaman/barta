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
        Schema::create('comments', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->foreignUuid('post_id')->constrained('posts');
            $table->foreignId('user_id')->constrained('users');
            $table->longText('content');
            $table->integer('total_likes')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['post_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('comments');
    }
};
