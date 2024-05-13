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
        Schema::create('eligibility_criteria', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age_less_than')->nullable();
            $table->integer('age_greater_than')->nullable();
            $table->integer('last_login_days_ago')->nullable();
            $table->double('income_less_than', 14, 2)->nullable();
            $table->double('income_greater_than', 14, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eligibility_criteria');
    }
};
