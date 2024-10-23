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
        Schema::create('users_jogo', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_user_id'); 
            $table->unsignedBigInteger('fk_jogo_id'); 
            $table->timestamp('download_date')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->primary(['fk_user_id', 'fk_jogo_id']); 

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
