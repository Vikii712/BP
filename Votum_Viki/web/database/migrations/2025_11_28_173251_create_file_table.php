<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('event_id')->nullable();
            $table->unsignedBigInteger('section_id')->nullable();

            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');

            $table->text('title_sk')->nullable();
            $table->text('title_en')->nullable();
            $table->text('url');
            $table->enum('type', ['image', 'video', 'document']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
