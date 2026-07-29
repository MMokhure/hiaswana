<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn([
                'bank_name',
                'bank_account_name',
                'bank_account_number',
                'bank_branch_code',
                'bank_payment_reference',
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('bank_name')->nullable()->after('payment_status');
            $table->string('bank_account_name')->nullable()->after('bank_name');
            $table->string('bank_account_number', 60)->nullable()->after('bank_account_name');
            $table->string('bank_branch_code', 50)->nullable()->after('bank_account_number');
            $table->string('bank_payment_reference', 120)->nullable()->after('bank_branch_code');
        });
    }
};
