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
        Schema::create('combo_plan_and_plans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('plan_id')->unsigned()->index()->comment('Id of plans table');
            $table->bigInteger('combo_plan_id')->unsigned()->index()->comment('Id of combo_plans table');
            $table->timestamps();

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->foreign('combo_plan_id')->references('id')->on('combo_plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combo_plan_and_plans');
    }
};
