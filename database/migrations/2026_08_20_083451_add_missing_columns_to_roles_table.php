<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('roles', function (Blueprint $table) {
            // Check if slug column exists before adding
            if (!Schema::hasColumn('roles', 'slug')) {
                $table->string('slug')->unique()->after('name');
            }
            
            // Check if description column exists before adding
            if (!Schema::hasColumn('roles', 'description')) {
                $table->text('description')->nullable()->after('slug');
            }
        });
    }

    public function down(): void
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn(['slug', 'description']);
        });
    }
};