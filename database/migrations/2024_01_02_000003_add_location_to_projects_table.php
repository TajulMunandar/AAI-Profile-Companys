<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('location')->nullable()->after('project_type');
        });

        DB::statement('ALTER TABLE projects MODIFY project_director VARCHAR(255) NULL');
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE projects MODIFY project_director VARCHAR(255) NOT NULL');

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('location');
        });
    }
};
