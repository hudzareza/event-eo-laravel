<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('thumbnail')->nullable()->after('title');
            $table->string('category')->nullable()->after('thumbnail');
            $table->integer('registered_count')->default(0)->after('quota');
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn([
                'thumbnail',
                'category',
                'registered_count'
            ]);
        });
    }
};