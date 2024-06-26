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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->string('p_type');
            $table->string('bed');
            $table->string('area');
            $table->string('size');
            $table->string('address');
            $table->string('price');
            $table->string('desc');
            $table->string('image');
            $table->string('number_of_room');
            $table->string('property_status');
            $table->string('number_bathroom');
            $table->string('year');
            $table->string('facilities');
            $table->string('slag');
            $table->string('floor_plan');
            $table->string('map');
            $table->string('video');
            $table->string('long');
            $table->string('lat');
            $table->boolean('featured');
            $table->string('hall');
            $table->string('kichan');
            $table->string('dining');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
