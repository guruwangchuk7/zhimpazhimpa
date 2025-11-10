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
        if (Schema::hasTable('recipes')) {
            $hasCreatedAtCamel = Schema::hasColumn('recipes', 'createdAt');
            $hasUpdatedAtCamel = Schema::hasColumn('recipes', 'updatedAt');

            if ($hasCreatedAtCamel || $hasUpdatedAtCamel) {
                Schema::table('recipes', function (Blueprint $table) use ($hasCreatedAtCamel, $hasUpdatedAtCamel) {
                    if ($hasUpdatedAtCamel) {
                        $table->dropColumn('updatedAt');
                    }
                    if ($hasCreatedAtCamel) {
                        $table->dropColumn('createdAt');
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
            Schema::table('recipes', function (Blueprint $table) {
                // recreate camelCase timestamps if the rollback is needed
                if (! Schema::hasColumn('recipes', 'createdAt')) {
                    $table->timestamp('createdAt')->nullable();
                }
                if (! Schema::hasColumn('recipes', 'updatedAt')) {
                    $table->timestamp('updatedAt')->nullable();
                }
            });
        }
    }
};
