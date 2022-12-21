<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_veiculo');
            $table->string('ano', 9);
            $table->string('cor', 45);
            $table->string('img', 255)->nullable();
            $table->string('placa')->nullable();
            $table->foreignId('marca_id')->references('id')->on('marcas');
            $table->foreignId('modelo_id')->references('id')->on('modelos');
            $table->foreignId('versao_id')->references('id')->on('versoes');
            
            
  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veiculos');
    }
};
