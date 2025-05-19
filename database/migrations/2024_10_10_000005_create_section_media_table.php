<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('section_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id');
            $table->foreignId('media_id');
            $table->integer('order')->default(0);
            $table->timestamps();

            $table->unique(['section_id', 'media_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('section_media');
    }
};
