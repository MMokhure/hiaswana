<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'title'       => 'Annual Health Informatics Conference 2026',
                'description' => 'The premier gathering of health informatics professionals, researchers, and policymakers in Botswana. Featuring keynote sessions, workshops, and networking opportunities focused on digital health transformation.',
                'category'    => 'conference',
                'event_date'  => '2026-09-15',
                'location'    => 'Gaborone International Convention Centre',
                'status'      => 'published',
            ],
            [
                'title'       => 'Data Standards & Interoperability Workshop',
                'description' => 'A hands-on workshop exploring HL7 FHIR, ICD coding, and SNOMED CT implementation in Botswana\'s health information systems. Suitable for health IT professionals and clinicians.',
                'category'    => 'workshops',
                'event_date'  => '2026-05-20',
                'location'    => 'University of Botswana, Gaborone',
                'status'      => 'published',
            ],
            [
                'title'       => 'Digital Health Policy Forum',
                'description' => 'A multi-stakeholder forum discussing the national digital health strategy, data governance frameworks, and ethical considerations for AI in healthcare.',
                'category'    => 'forums',
                'event_date'  => '2026-03-10',
                'location'    => 'Virtual (Zoom)',
                'status'      => 'published',
            ],
            [
                'title'       => 'Health Informatics Webinar Series: eHealth Readiness',
                'description' => 'A webinar presenting findings from recent eHealth readiness assessment studies in Botswana, with discussion on implications for policy and practice.',
                'category'    => 'webinars',
                'event_date'  => '2026-02-28',
                'location'    => 'Online',
                'status'      => 'published',
            ],
            [
                'title'       => 'Mentorship Programme Launch',
                'description' => 'Launch of the HIASWANA mentorship programme connecting early-career health informatics professionals with experienced mentors from academia, government, and industry.',
                'category'    => 'workshops',
                'event_date'  => '2026-04-05',
                'location'    => 'Gaborone, Botswana',
                'status'      => 'published',
            ],
            [
                'title'       => 'Community of Practice: Health Data Governance',
                'description' => 'Regular community of practice meeting focused on health data governance principles, data privacy, and security in Botswana\'s digital health ecosystem.',
                'category'    => 'forums',
                'event_date'  => '2026-06-12',
                'location'    => 'Virtual / Hybrid',
                'status'      => 'published',
            ],
        ];

        foreach ($events as $e) {
            Event::create($e);
        }

        $this->command->info('Seeded ' . count($events) . ' events.');
    }
}