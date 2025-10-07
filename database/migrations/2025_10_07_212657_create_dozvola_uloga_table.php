<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('dozvola_uloga', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dozvola_id')->constrained('dozvole')->cascadeOnDelete();
            $table->foreignId('uloga_id')->constrained('uloge')->cascadeOnDelete();
            $table->unique(['dozvola_id','uloga_id']);
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('dozvola_uloga');
    }
};
