<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->string('veiculo');
            $table->string('marca');
            $table->integer('ano');
            $table->text('descricao');
            $table->boolean('vendido')->default(false);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('veiculos');
    }
};