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
        Schema::table('currencies', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('cities', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('contacts', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('countries', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('facilities', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('holidays', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('properties', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('states', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('checkouts', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('brands', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('professionals', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('currencies', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('cities', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('countries', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('facilities', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('holidays', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('properties', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('states', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('checkouts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('brands', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('professionals', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
