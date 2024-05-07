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
        Schema::create('chatroom_belong_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('room_id')->constrained('chat_rooms')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chatroom_belong_users',function(Blueprint $table){
            $table->dropForeign('chatroom_belong_users_user_id_foreign');
            $table->dropForeign('chatroom_belong_users_room_id_foreign');
            $table->dropColumn('room_id');
        });
        Schema::dropIfExists('chatroom_belong_users');
    }
};
