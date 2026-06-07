<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('venues', function (Blueprint $table) {
            if (!Schema::hasColumn('venues', 'description')) {
                $table->text('description')->nullable()->after('sport_type');
            }
            if (!Schema::hasColumn('venues', 'price_per_hour')) {
                $table->decimal('price_per_hour', 8, 2)->default(2.00)->after('description');
            }
            if (!Schema::hasColumn('venues', 'is_available')) {
                $table->boolean('is_available')->default(true)->after('price_per_hour');
            }
        });
    }

    public function down(): void
    {
        Schema::table('venues', function (Blueprint $table) {
            $table->dropColumn(['description', 'price_per_hour', 'is_available']);
        });
    }
};
