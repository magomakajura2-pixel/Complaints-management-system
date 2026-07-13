<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('complaint_remarks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('complaintNumber')->nullable();
            $table->string('status')->nullable();
            $table->text('remark')->nullable();
            $table->timestamp('remarkDate')->nullable();
            $table->timestamps();
            $table->foreign('complaintNumber')->references('complaintNumber')->on('complaints')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('complaint_remarks');
    }
};
