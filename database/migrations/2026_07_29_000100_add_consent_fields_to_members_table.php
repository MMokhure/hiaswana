<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->timestamp('privacy_consent_at')->nullable()->after('payment_status');
            $table->timestamp('terms_consent_at')->nullable()->after('privacy_consent_at');
            $table->string('consent_ip', 45)->nullable()->after('terms_consent_at');
        });
    }

    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn(['privacy_consent_at', 'terms_consent_at', 'consent_ip']);
        });
    }
};
