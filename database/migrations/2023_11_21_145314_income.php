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
        Schema::create('income', function(Blueprint $table){
            $table->id();
            $table->string('month');
            $table->integer('year');
            $table->integer('rental_costs');
            $table->integer('other');
            $table->integer('income_total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('income');
    }
};
