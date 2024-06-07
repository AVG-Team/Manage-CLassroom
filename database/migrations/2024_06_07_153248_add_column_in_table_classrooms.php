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
        Schema::table('classrooms', function (Blueprint $table) {
            $table->integer('grade')->default(12);
            $table->integer('capacity')->default(18);
            $table->foreignUuid('teacher_id')->nullable()->constrained('users', 'uuid')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_classrooms', function (Blueprint $table) {
            $table->dropColumn('grade');
            $table->dropColumn('capacity');
            $table->dropForeign(['teacher_id']);
            $table->dropColumn('teacher_id');
        });
    }
};
