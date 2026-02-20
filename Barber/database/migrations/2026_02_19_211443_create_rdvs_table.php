<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rdvs', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->date('date');
            $table->string('heure'); // exemple: '09:00'
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rdvs');
    }
};