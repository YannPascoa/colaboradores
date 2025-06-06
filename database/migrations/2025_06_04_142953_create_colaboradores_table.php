<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('colaboradores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->enum('setor', ['Tecnologia', 'Administrativo', 'Projeto']);
            $table->string('cidade');
            $table->dateTime('data_checkin');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('colaboradores');
    }
};

