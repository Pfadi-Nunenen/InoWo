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
            $table->foreign('fk_user')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('bills', function (Blueprint $table) {
            $table->foreign('fk_billtype')->references('id')->on('billtype')->onDelete('cascade');
        });

        Schema::table('meals', function (Blueprint $table) {
            $table->foreign('fk_users')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('meals', function (Blueprint $table) {
            $table->foreign('fk_meal_types')->references('id')->on('meal_types')->onDelete('cascade');
        });
    }
};
