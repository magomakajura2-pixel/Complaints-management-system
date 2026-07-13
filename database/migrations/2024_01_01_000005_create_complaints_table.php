<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id('complaintNumber');
            $table->unsignedBigInteger('userId')->nullable();
            $table->unsignedBigInteger('category')->nullable();
            $table->string('subcategory')->nullable();
            $table->string('complaintType')->nullable();
            $table->string('state')->nullable();
            $table->string('noc')->nullable();
            $table->text('complaintDetails')->nullable();
            $table->string('complaintFile')->nullable();
            $table->timestamp('regDate')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('lastUpdationDate')->nullable();
            $table->timestamps();
            $table->foreign('userId')->references('id')->on('users')->onDelete('set null');
            $table->foreign('category')->references('id')->on('categories')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
