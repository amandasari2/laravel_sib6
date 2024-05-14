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
        // Ini contoh migrations dari Laravel Staff
        Schema::create('staff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('nip', 50)->unique();
            $table->string('name',50);
            $table->text('alamat');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
