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
        if(! Schema::hasColumn('password_reset_tokens', 'type')) {
            Schema::table('password_reset_tokens', function (Blueprint $table) {
                $table->integer('type')->default(0);
            });
        }
        if(! Schema::hasColumn('password_reset_tokens', 'status')) {
            Schema::table('password_reset_tokens', function (Blueprint $table) {
                $table->integer('status')->default(0);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if(Schema::hasColumn('password_reset_tokens', 'type')) {
            Schema::table('password_reset_tokens', function (Blueprint $table) {
                $table->dropColumn('type');
                $table->dropColumn('status');
            });
        }
    }
};
