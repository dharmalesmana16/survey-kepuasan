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
        Schema::table('tb_responden', function (Blueprint $table) {
            $table->integer("A")->default(0);
            $table->integer("B")->default(0);
            $table->integer("C")->default(0);
            $table->integer("D")->default(0);
            $table->integer("E")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_responden', function (Blueprint $table) {
            //
        });
    }
};
