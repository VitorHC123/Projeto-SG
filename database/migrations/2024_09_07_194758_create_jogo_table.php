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
        Schema::create('jogo', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->string('descricao')->nullable();
            $table->float('preco')->nullable();
            $table->string('jogo_img')->nullable();
            $table->bigInteger('fk_id_genero')->unsigned();
            $table->bigInteger('fk_id_imgs')->unsigned()->nullable(); 

            $table->foreign('fk_id_genero')
                ->references('id')
                ->on('genero');

            $table->foreign('fk_id_imgs')
                ->references('id')
                ->on('imgs')
                ->onDelete('set null'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogo');
    }
};
