<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('section_media', function (Blueprint $table) {
            $table->foreign('section_id')->references('id')->on('page_sections')->onDelete('cascade');
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('section_media', function (Blueprint $table) {
            $table->dropForeign(['section_id']);
            $table->dropForeign(['media_id']);
        });
    }
};
