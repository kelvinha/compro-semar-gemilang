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
        Schema::table('users', function (Blueprint $table) {
            // Drop the existing role column
            $table->dropColumn('role');
            
            // Add new columns
            $table->unsignedBigInteger('role_id')->after('email');
            $table->string('avatar')->nullable()->after('password');
            $table->boolean('is_active')->default(true)->after('avatar');
            $table->timestamp('email_verified_at')->nullable()->after('is_active');
            $table->rememberToken()->after('email_verified_at');
            
            // Add foreign key
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the new columns
            $table->dropForeign(['role_id']);
            $table->dropColumn(['role_id', 'avatar', 'is_active', 'email_verified_at', 'remember_token']);
            
            // Add back the original role column
            $table->string('role')->after('email');
        });
    }
};
