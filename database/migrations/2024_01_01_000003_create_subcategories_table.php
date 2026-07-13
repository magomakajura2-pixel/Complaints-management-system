<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoryid')->nullable();
            $table->string('subcategory')->nullable();
            $table->timestamp('creationDate')->nullable();
            $table->timestamp('updationDate')->nullable();
            $table->timestamps();
            $table->foreign('categoryid')->references('id')->on('categories')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subcategories');
    }
};
