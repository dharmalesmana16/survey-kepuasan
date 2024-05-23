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
        Schema::create('tb_question', function (Blueprint $table) {
            $table->id();
            $table->text("judul_pertanyaan");
            $table->unsignedBigInteger('group_id');
            $table->text("slug");

            $table->foreign('group_id')->references('id')->on('tb_group')->onDelete('cascade')->onUpdate("cascade");
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_question');
    }
};
