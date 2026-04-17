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
        Schema::table('registrations', function (Blueprint $table) {

            // Tambahan baru
            $table->string('leader_name')->nullable();
            $table->string('leader_email')->nullable();
            $table->integer('total_attendees')->default(1);

            // Optional: jangan langsung drop dulu (aman)
            // $table->dropColumn(['user_id', 'participant_id', 'qr_code', 'qr_token']);
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
