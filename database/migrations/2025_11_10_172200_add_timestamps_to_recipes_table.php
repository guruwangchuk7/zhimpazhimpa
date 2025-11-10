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
        // If the recipes table exists but missing timestamp columns, add them.
        if (Schema::hasTable('recipes')) {
            $needsCreated = ! Schema::hasColumn('recipes', 'created_at');
            $needsUpdated = ! Schema::hasColumn('recipes', 'updated_at');

            if ($needsCreated || $needsUpdated) {
                Schema::table('recipes', function (Blueprint $table) use ($needsCreated, $needsUpdated) {
                    if ($needsCreated) {
                        $table->timestamp('created_at')->nullable()->after('likes');
                    }
                    if ($needsUpdated) {
                        $table->timestamp('updated_at')->nullable()->after('created_at');
                    }
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('recipes')) {
            $hasCreated = Schema::hasColumn('recipes', 'created_at');
            $hasUpdated = Schema::hasColumn('recipes', 'updated_at');

            if ($hasCreated || $hasUpdated) {
                Schema::table('recipes', function (Blueprint $table) use ($hasCreated, $hasUpdated) {
                    if ($hasUpdated) {
                        $table->dropColumn('updated_at');
                    }
                    if ($hasCreated) {
                        $table->dropColumn('created_at');
                    }
                });
            }
        }
    }
};
