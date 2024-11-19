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
        Schema::create('custom_notifications', function (Blueprint $table) {
         $table->uuid('id')->primary();
    $table->string('type');
    $table->morphs('notifiable');
    $table->unsignedBigInteger('message_id');
    $table->unsignedBigInteger('sender_id'); 
    $table->text('message_content');
    $table->timestamp('read_at')->nullable();
    $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_notifications');
    }
};
