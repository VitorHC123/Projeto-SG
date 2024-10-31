<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users_jogo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_user_id'); 
            $table->unsignedBigInteger('fk_jogo_id'); 
            $table->decimal('valor', 8, 2); 
            $table->string('nome_user'); 
            $table->string('payment_id')->nullable(); 
            $table->string('status')->nullable(); 
            $table->timestamp('download_date')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('fk_user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade'); 

            $table->foreign('fk_jogo_id')
                  ->references('id')
                  ->on('jogo') 
                  ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_jogo');
    }
};
