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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('title_sk');
            $table->string('title_en');
            $table->text('content_sk');
            $table->text('content_en');
            $table->integer('year')->nullable();
            $table->integer('position');
            $table->enum('category',
                ['address', 'bank', 'tel', 'email',
                    'team','ourTeam','history', 'about', 'hero',
                    'percentWhy', 'percentInfo', 'percentHow', 'percentThanks',
                    'qrHow', 'financialWhy', 'financialThanks',
                    'otherWhy', 'otherThanks', 'otherType', 'otherIdea',
                    'support'
                ]);
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('sections');
    }
};
