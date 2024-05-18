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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->text('direct_message')->nullable('false');
            $table->string('dm_image')->nullable();
            $table->string('dm_video')->nullable();
            $table->foreignId('room_id')->constrained('chat_rooms')->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletesDatetime();
            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages',function (Blueprint $table) {
            $table->dropForeign('messages_room_id_foreign');
            $table->dropForeign('messages_user_id_foreign');
        });
        Schema::dropIfExists('messages');
    }
};
