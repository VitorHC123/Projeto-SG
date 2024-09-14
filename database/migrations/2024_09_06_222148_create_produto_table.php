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
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_id');
            $table->string('prod_nome');
            $table->float('prod_preco');
            $table->foreign('cat_id')
                    ->references('id')
                    ->on('categoria');
                    //RELACIONAMENTO ENTRE TABELAS
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto');
    }
};
