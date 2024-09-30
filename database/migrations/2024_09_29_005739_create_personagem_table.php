<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migratiom.
     */
    public function up(): void
    {
        Schema::create('personagem', function (Blueprint $table) {
            $table->id('idPersonagem');
            $table->string('nomePersonagem');
            $table->date('dataPersonagem');
            $table->string('obraPersonagem');
            $table->string('imgPersonagem');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migratiom.
     */
    public function down(): void
    {
        Schema::dropIfExists('personagem');
    }
};
