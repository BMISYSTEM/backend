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
        Schema::table('setpdfs', function (Blueprint $table) {
            $table->foreignId('users')->constrained()->onDelete('cascade');
            $table->string('Pdf');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('setpdfs', function (Blueprint $table) {
            //
        });
    }
};
