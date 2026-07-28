<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('membership_number')->nullable()->unique()->after('status');
            $table->timestamp('approved_at')->nullable()->after('membership_number');
            $table->text('notes')->nullable()->after('approved_at');
        });
    }

    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn(['membership_number', 'approved_at', 'notes']);
        });
    }
};
