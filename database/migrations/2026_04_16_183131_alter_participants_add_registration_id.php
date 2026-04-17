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
        Schema::table('participants', function (Blueprint $table) {
            $table->foreignId('registration_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();

            $table->string('qr_code')->nullable();
            $table->string('qr_token')->nullable()->unique();
            $table->timestamp('checked_in_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
