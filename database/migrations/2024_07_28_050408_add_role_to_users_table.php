<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Add the 'role' column with a default value of 'user'
            $table->enum('role', ['user', 'admin'])->default('user');
        });
    }

    
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the 'role' column
            $table->dropColumn('role');
        });
    }
};

