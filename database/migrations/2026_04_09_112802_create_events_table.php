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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();

            $table->string('title');
            $table->text('description')->nullable();
            $table->string('location')->nullable();

            $table->dateTime('start_date');
            $table->dateTime('end_date');

            $table->integer('quota')->nullable();

            $table->enum('event_type', ['umum','freemium','private','plus']);
            $table->boolean('is_public')->default(true);

            $table->boolean('is_paid')->default(false);
            $table->decimal('price', 12, 2)->nullable();

            $table->string('access_token')->nullable();

            $table->enum('status', ['draft','published','closed'])->default('draft');

            $table->foreignId('created_by')->constrained('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
