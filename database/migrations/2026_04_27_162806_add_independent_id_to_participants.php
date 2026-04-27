<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->string('independent_id')->nullable()->unique()->after('qr_token');
        });
    }

    public function down()
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->dropColumn('independent_id');
        });
    }
};
