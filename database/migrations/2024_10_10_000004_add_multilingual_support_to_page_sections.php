<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('page_sections', function (Blueprint $table) {
            $table->string('name_id')->nullable()->after('name');
            $table->longText('content_id')->nullable()->after('content');
        });
    }

    public function down()
    {
        Schema::table('page_sections', function (Blueprint $table) {
            $table->dropColumn('name_id');
            $table->dropColumn('content_id');
        });
    }
};
