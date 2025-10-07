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
        Schema::create('pregledi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('korisnik_id')->constrained('users')->cascadeOnDelete();
            $table->date('datum_pregleda');
            $table->string('vrsta_pregleda');
            $table->string('lijecnik')->nullable();
            $table->text('nalaz')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pregleds');
    }
};
