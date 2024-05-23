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
        Schema::create('tb_responden', function (Blueprint $table) {
            $table->id();
            $table->string("nama")->nullable();
            $table->integer("umur")->nullable();
            $table->integer("jawaban");
            $table->text("komentar")->nullable();
            $table->unsignedBigInteger("group_id");
            $table->timestampsTz();
            $table->foreign('group_id')->references('id')->on('tb_group')->onDelete('cascade')->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_responden');
    }
};
