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
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('status')->default('open')->nullable()->after('is_view');
        });

        Schema::table('checkouts', function (Blueprint $table) {
            $table->string('status')->default('open')->nullable()->after('is_viewchackout');
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
        Schema::table('contacts', function (Blueprint $table) {
            Schema::dropIfExists('status');
        });

        Schema::table('checkouts', function (Blueprint $table) {
            Schema::dropIfExists('status');
        });

        Schema::table('brands', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('professionals', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
