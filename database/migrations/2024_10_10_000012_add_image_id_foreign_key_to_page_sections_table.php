<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('page_sections', function (Blueprint $table) {
            $table->foreign('image_id')->references('id')->on('media')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('page_sections', function (Blueprint $table) {
            $table->dropForeign(['image_id']);
        });
    }
};
