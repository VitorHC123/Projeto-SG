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
        Schema::create('users_adm', function (Blueprint $table) {
            $table->id();
            $table->string('adm_name');
            $table->string('adm_email')->unique();
            $table->timestamp('adm_email_verified_at')->nullable();
            $table->string('adm_password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_adm');
    }
};
