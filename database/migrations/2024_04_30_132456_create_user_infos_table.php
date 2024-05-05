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
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id('userinfo_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('account_name')->nullable(false)->default('my_user');
            $table->string('icon')->nullable();
            $table->text('user_bio')->nullable();
            $table->string('account_id')->nullable()->unique();
            $table->string('account_level')->default('normal');
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_infos',function (Blueprint $table){
            $table->dropForeign('user_infos_user_id_foreign');
            $table->dropColumn('user_id');
        });
        Schema::dropIfExists('user_infos');
    }
};
