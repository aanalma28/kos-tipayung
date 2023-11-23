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
            $table->string('year');
            $table->string('utility_costs');
            $table->string('operating_costs');
            $table->string('other');
            $table->string('outcome_total');
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
