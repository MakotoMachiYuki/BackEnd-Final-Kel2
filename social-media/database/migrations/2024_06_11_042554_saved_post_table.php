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
        Schema::table('saved_post', function (Blueprint $table){
            $table->id();
            $table->foreignId('creator') -> constrained('creators');
            $table->foreignId('user_id') -> constrained('users');
            $table->foreignId('post_id') -> constrained('posts');
            $table->date('saved_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('saved_post', function (Blueprint $table){
            $table->dropForeign(['creator']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['post_id']);
            $table->dropColumn('saved_date');
            });

        Schema::dropIfExists('saved_post');
    }
};
