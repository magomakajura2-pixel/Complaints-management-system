<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullName');
            $table->string('userEmail')->unique();
            $table->string('password');
            $table->string('contactNo')->nullable();
            $table->text('address')->nullable();
            $table->string('State')->nullable();
            $table->string('country')->nullable();
            $table->string('pincode')->nullable();
            $table->string('userImage')->nullable();
            $table->string('regDate')->nullable();
            $table->string('updationDate')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
