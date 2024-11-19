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
    $table->unsignedBigInteger('sender_id'); 
    $table->unsignedBigInteger('receiver_id')   ;
    $table->enum('sender_type', ['user', 'admin']);  
    $table->text('message_content'); 
    $table->string('file_path')->nullable(); 
    $table->timestamps(); 

    $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
    $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
