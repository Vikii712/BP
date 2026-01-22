<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->text('title_sk');
            $table->text('title_en');
            $table->text('content_sk');
            $table->text('content_en');
            $table->boolean('inCalendar')->default(false);
            $table->boolean('inHome')->default(false);
            $table->boolean('inGallery')->default(false);
            $table->boolean('archived')->default(false);
            $table->enum('color', ['c1', 'c2', 'c3','c4', 'c5', 'c6','c7', 'c8'])->nullable();
            $table->text('main_pic')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
