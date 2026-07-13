<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId')->nullable();
            $table->string('username')->nullable();
            $table->string('userip')->nullable();
            $table->timestamp('loginTime')->nullable();
            $table->string('logout')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
            $table->foreign('userId')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_logs');
    }
};
