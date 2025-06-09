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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable(); // Indonesian description
            $table->string('logo')->nullable();
            $table->string('website_url')->nullable();
            $table->string('industry')->nullable();
            $table->string('location')->nullable();
            $table->date('partnership_start')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('active')->default(true);
            $table->integer('order')->default(0);
            $table->json('contact_info')->nullable(); // Store contact details
            $table->json('services_provided')->nullable(); // Services we provided to this client
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
