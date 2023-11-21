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
        //
        Schema::create('room_table', function (Blueprint $table){
            $table->id();
            $table->integer('room_number');
            $table->integer('price');
            $table->string('room_type');
            $table->string('image');
            $table->string('status');
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('room_table');
    }
};
