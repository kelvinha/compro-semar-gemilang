<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('type');
            $table->integer('order');
            $table->boolean('active')->default(true);
            $table->text('content')->nullable();
            $table->string('video_url')->nullable();
            $table->json('options')->nullable();
            $table->json('media_ids')->nullable();
            $table->foreignId('image_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('page_sections');
    }
};
