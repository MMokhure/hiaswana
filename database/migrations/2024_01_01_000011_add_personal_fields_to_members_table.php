<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('surname')->nullable()->after('name');
            $table->string('identification_number')->nullable()->after('surname');
            $table->string('nationality')->nullable()->after('identification_number');
            $table->text('residential_address')->nullable()->after('nationality');
            $table->text('postal_address')->nullable()->after('residential_address');
        });
    }

    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn(['surname', 'identification_number', 'nationality', 'residential_address', 'postal_address']);
        });
    }
};
