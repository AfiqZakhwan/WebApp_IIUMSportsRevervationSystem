<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'matric_number')) {
                $table->string('matric_number')->nullable()->after('name');
            }
            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable()->after('matric_number');
            }
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('student')->after('phone');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['matric_number', 'phone', 'role']);
        });
    }
};
