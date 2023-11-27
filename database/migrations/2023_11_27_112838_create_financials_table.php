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
        Schema::create('financials', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->integer('year');
            $table->integer('rent_costs');
            $table->integer('other_income');
            $table->integer('sum_income');
            $table->integer('utility_costs');
            $table->integer('operational_costs');
            $table->integer('other_outcome');
            $table->integer('sum_outcome');
            $table->integer('gross_income');
            $table->integer('net_income');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financials');
    }
};
