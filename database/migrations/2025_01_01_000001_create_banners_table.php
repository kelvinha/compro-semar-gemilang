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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_id')->nullable(); // Indonesian title
            $table->text('subtitle')->nullable();
            $table->text('subtitle_id')->nullable(); // Indonesian subtitle
            $table->text('description')->nullable();
            $table->text('description_id')->nullable(); // Indonesian description
            $table->string('image')->nullable();
            $table->string('mobile_image')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_text_id')->nullable(); // Indonesian button text
            $table->string('button_url')->nullable();
            $table->string('button_target')->default('_self'); // _self or _blank
            $table->boolean('active')->default(true);
            $table->integer('order')->default(0);
            $table->string('type')->default('homepage'); // homepage, category, etc.
            $table->json('options')->nullable(); // Additional options
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
