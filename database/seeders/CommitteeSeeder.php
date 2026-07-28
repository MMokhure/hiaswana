<?php

namespace Database\Seeders;

use App\Models\Committee;
use App\Models\CommitteeMember;
use Illuminate\Database\Seeder;

class CommitteeSeeder extends Seeder
{
    public function run(): void
    {
        // ── Executive Committee ──────────────────────────────────────────────
        $exec = Committee::create([
            'name'        => 'Executive Committee',
            'description' => 'The governing body responsible for strategic direction, policy decisions, and overall management of HIASWANA activities.',
            'sort_order'  => 1,
            'is_active'   => true,
        ]);

        $execMembers = [
            ['name' => 'Dr. Keatlaretse Mauco',  'role' => 'President',       'email' => 'kmauco@hiaswana.co.bw',  'organization' => 'University of Botswana',              'sort_order' => 1],
            ['name' => 'Dr. Kabelo Ndlovu',      'role' => 'Vice President',  'email' => 'kndlovu@hiaswana.co.bw',  'organization' => 'Ministry of Health, Botswana',        'sort_order' => 2],
            ['name' => 'Ms. Boitumelo Mosesane', 'role' => 'Secretary',       'email' => 'bmosesane@hiaswana.co.bw','organization' => 'Botswana Health Informatics',         'sort_order' => 3],
            ['name' => 'Mr. Omphemetse Makhura', 'role' => 'Treasurer',       'email' => 'omakhura@hiaswana.co.bw', 'organization' => 'National Health Laboratory',          'sort_order' => 4],
        ];

        foreach ($execMembers as $m) {
            $exec->members()->create($m);
        }

        // ── Research & Innovation Committee ──────────────────────────────────
        $research = Committee::create([
            'name'        => 'Research & Innovation Committee',
            'description' => 'Drives applied research, pilot projects, and innovation in digital health, AI, and health data science across Botswana.',
            'sort_order'  => 2,
            'is_active'   => true,
        ]);

        $researchMembers = [
            ['name' => 'Dr. Sipho Chibemba',     'role' => 'Chair',           'email' => 'schibemba@hiaswana.co.bw', 'organization' => 'University of Botswana',              'sort_order' => 1],
            ['name' => 'Prof. Richard Scott',    'role' => 'Advisor',         'email' => 'rscott@hiaswana.co.bw',    'organization' => 'University of KwaZulu-Natal',         'sort_order' => 2],
            ['name' => 'Dr. Keatlaretse Mauco',  'role' => 'Member',          'email' => 'kmauco@hiaswana.co.bw',   'organization' => 'University of Botswana',              'sort_order' => 3],
        ];

        foreach ($researchMembers as $m) {
            $research->members()->create($m);
        }

        // ── Education & Capacity Building Committee ──────────────────────────
        $education = Committee::create([
            'name'        => 'Education & Capacity Building Committee',
            'description' => 'Develops and coordinates workshops, short courses, mentorship programmes, and communities of practice to strengthen the health informatics workforce.',
            'sort_order'  => 3,
            'is_active'   => true,
        ]);

        $educationMembers = [
            ['name' => 'Ms. Boitumelo Mosesane', 'role' => 'Chair',           'email' => 'bmosesane@hiaswana.co.bw', 'organization' => 'Botswana Health Informatics',         'sort_order' => 1],
            ['name' => 'Dr. Kabelo Ndlovu',      'role' => 'Member',          'email' => 'kndlovu@hiaswana.co.bw',   'organization' => 'Ministry of Health, Botswana',        'sort_order' => 2],
            ['name' => 'Mr. Omphemetse Makhura', 'role' => 'Member',          'email' => 'omakhura@hiaswana.co.bw',  'organization' => 'National Health Laboratory',          'sort_order' => 3],
        ];

        foreach ($educationMembers as $m) {
            $education->members()->create($m);
        }

        $this->command->info('Seeded 3 committees with ' . CommitteeMember::count() . ' total members.');
    }
}