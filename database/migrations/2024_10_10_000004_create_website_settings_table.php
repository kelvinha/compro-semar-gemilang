<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('group')->default('general');
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->text('value_id')->nullable();
            $table->string('type')->default('text'); // text, textarea, image, boolean, etc.
            $table->json('options')->nullable();
            $table->string('display_name')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_public')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('website_settings');
    }
};
