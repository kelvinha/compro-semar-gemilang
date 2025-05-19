<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('submenus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->string('name');
            $table->string('name_id')->nullable();
            $table->string('slug')->unique();
            $table->string('url')->nullable();
            $table->string('type')->default('page'); // page, link, etc.
            $table->boolean('active')->default(true);
            $table->integer('order')->default(0);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps();

            $table->foreign('menu_id')
                ->references('id')
                ->on('menus')
                ->onDelete('cascade');

            $table->foreign('parent_id')
                ->references('id')
                ->on('submenus')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('submenus');
    }
};
