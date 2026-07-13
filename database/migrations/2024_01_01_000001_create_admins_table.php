<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->bigInteger('mobilenumber')->nullable();
            $table->string('email')->nullable();
            $table->string('username');
            $table->string('password');
            $table->timestamp('creationDate')->nullable();
            $table->string('updationDate');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
