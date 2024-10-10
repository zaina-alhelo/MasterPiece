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
    $table->unsignedBigInteger('sender_id'); // مرسل الرسالة (إما المستخدم أو الإداري)
    $table->unsignedBigInteger('receiver_id'); // مستلم الرسالة (إما المستخدم أو الإداري)
    $table->enum('sender_type', ['user', 'admin']); // تحديد نوع المرسل
    $table->text('message_content'); // محتوى الرسالة
    $table->string('file_path')->nullable(); // مسار الملف المرفق (PDF أو صورة)
    $table->timestamps(); // تاريخ ووقت إرسال الرسالة

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
