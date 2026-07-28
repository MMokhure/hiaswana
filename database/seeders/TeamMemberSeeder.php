<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name'       => 'Dr. Keatlaretse Mauco',
                'role'       => 'President',
                'bio'        => 'Health informatics specialist and researcher with extensive experience in eHealth readiness assessment, digital health policy, and health information systems in Botswana and the region.',
                'sort_order' => 1,
            ],
            [
                'name'       => 'Dr. Kabelo Ndlovu',
                'role'       => 'Vice President',
                'bio'        => 'Public health informatics expert focused on health data governance, disease surveillance systems, and the use of digital tools for public health decision-making.',
                'sort_order' => 2,
            ],
            [
                'name'       => 'Ms. Boitumelo Mosesane',
                'role'       => 'Secretary',
                'bio'        => 'Digital health professional with expertise in health informatics capacity building, project management, and stakeholder engagement across the health sector.',
                'sort_order' => 3,
            ],
            [
                'name'       => 'Mr. Omphemetse Makhura',
                'role'       => 'Treasurer',
                'bio'        => 'ICT and health data management specialist with experience in laboratory information systems, REDCap implementation, and health data analytics.',
                'sort_order' => 4,
            ],
            [
                'name'       => 'Dr. Sipho Chibemba',
                'role'       => 'Committee Member',
                'bio'        => 'Health systems researcher with a focus on health data governance, digital health ethics, and the integration of AI in healthcare delivery.',
                'sort_order' => 5,
            ],
            [
                'name'       => 'Prof. Richard Scott',
                'role'       => 'Advisor',
                'bio'        => 'International health informatics expert and professor emeritus with decades of experience in telemedicine, eHealth readiness, and health informatics education in developing countries.',
                'sort_order' => 6,
            ],
        ];

        foreach ($members as $m) {
            TeamMember::create($m);
        }

        $this->command->info('Seeded ' . count($members) . ' team members.');
    }
}