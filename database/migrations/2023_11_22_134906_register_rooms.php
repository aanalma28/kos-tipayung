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
        Schema::create('register_rooms', function(Blueprint $table){
            $table->id();
            $table->integer('room_number');
            $table->string('status');
            $table->string("name");
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('image');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('register_rooms');
    }
};
