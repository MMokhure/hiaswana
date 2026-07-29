<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $settings = [
            ['group' => 'pages', 'key' => 'membership_bank_visible', 'label' => 'Show Membership Bank Details', 'value' => '1', 'type' => 'checkbox', 'sort_order' => 73],
            ['group' => 'pages', 'key' => 'membership_bank_section_title', 'label' => 'Membership Bank Section Title', 'value' => 'Bank Details for Membership Payments and Donations', 'type' => 'text', 'sort_order' => 74],
            ['group' => 'pages', 'key' => 'membership_bank_name', 'label' => 'Membership Bank Name', 'value' => 'First National Bank Botswana', 'type' => 'text', 'sort_order' => 75],
            ['group' => 'pages', 'key' => 'membership_bank_account_name', 'label' => 'Membership Bank Account Name', 'value' => 'HIASWANA', 'type' => 'text', 'sort_order' => 76],
            ['group' => 'pages', 'key' => 'membership_bank_account_number', 'label' => 'Membership Bank Account Number', 'value' => 'Please contact HIASWANA for the account number', 'type' => 'text', 'sort_order' => 77],
            ['group' => 'pages', 'key' => 'membership_bank_branch_code', 'label' => 'Membership Bank Branch Code', 'value' => 'Please contact HIASWANA', 'type' => 'text', 'sort_order' => 78],
            ['group' => 'pages', 'key' => 'membership_bank_reference_note', 'label' => 'Membership Bank Reference Note', 'value' => 'Use your Full Name + Phone Number as payment reference.', 'type' => 'textarea', 'sort_order' => 79],
            ['group' => 'pages', 'key' => 'membership_donation_note', 'label' => 'Membership Donation Note', 'value' => 'For donations, use the same account details and include "Donation" in your transfer reference.', 'type' => 'textarea', 'sort_order' => 80],
        ];

        foreach ($settings as $setting) {
            DB::table('settings')->updateOrInsert(
                ['key' => $setting['key']],
                $setting
            );
        }
    }

    public function down(): void
    {
        DB::table('settings')->whereIn('key', [
            'membership_bank_visible',
            'membership_bank_section_title',
            'membership_bank_name',
            'membership_bank_account_name',
            'membership_bank_account_number',
            'membership_bank_branch_code',
            'membership_bank_reference_note',
            'membership_donation_note',
        ])->delete();
    }
};
