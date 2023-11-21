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
        Schema::create('outcome', function(Blueprint $table){
            $table->id();
            $table->string('month');
            $table->integer('year');
            $table->integer('utility_costs');
            $table->integer('operating_costs');
            $table->integer('other');
            $table->integer('outcome_total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('outcome');
    }
};
