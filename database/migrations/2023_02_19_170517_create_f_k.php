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
        Schema::table('bills', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('bills', function (Blueprint $table) {
            $table->foreign('billtype_id')->references('id')->on('billtype')->onDelete('cascade');
        });

        Schema::table('meals', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('meals', function (Blueprint $table) {
            $table->foreign('meal_types_id')->references('id')->on('meal_types')->onDelete('cascade');
        });
    }
};
