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
        if (Schema::hasTable('classrooms')) {
            Schema::table('classrooms', function (Blueprint $table) {
                DB::statement('ALTER TABLE classrooms ADD FULLTEXT `title` (`title`)'); //đánh index cho cột name
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('classrooms')) {
            Schema::table('classrooms', function (Blueprint $table) {
                DB::statement('ALTER TABLE classrooms DROP INDEX title');
            });
        }
    }
};
