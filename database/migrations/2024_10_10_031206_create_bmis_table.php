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
        $table->id();
             $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->float('weight'); 
            $table->float('height'); 
            $table->float('bmi'); 
            $table->timest   Schema::create('bmis', function (Blueprint $table) {
         amps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bmis');
    }
};
