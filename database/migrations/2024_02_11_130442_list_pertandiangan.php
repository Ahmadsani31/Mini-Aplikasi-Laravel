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
        Schema::create('list_pertandiangans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pertandingan_id');
            $table->integer('babak');
            $table->integer('klub_a');
            $table->integer('klub_b');
            $table->integer('score_a');
            $table->integer('score_b');
            $table->string('menang')->nullable();
            $table->string('point')->nullable();
            $table->foreign('pertandingan_id')
                ->references('id')->on('pertandingans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_pertandiangans');
    }
};
