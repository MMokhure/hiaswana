<?php

namespace Database\Seeders;

use App\Models\Slide;
use Illuminate\Database\Seeder;

class SlideSeeder extends Seeder
{
    public function run(): void
    {
        $slides = [
            // Hero slides
            [
                'title'      => 'Advancing Digital Health in Botswana',
                'subtitle'   => 'Bringing together clinicians, technologists, academics, and policymakers to strengthen health information systems.',
                'image_path' => 'assets/img/c2.jpg',
                'location'   => 'hero',
                'sort_order' => 1,
                'is_active'  => true,
            ],
            [
                'title'      => 'Join the Health Informatics Community',
                'subtitle'   => 'Connect with professionals shaping the future of digital health across Botswana and the region.',
                'image_path' => 'assets/img/c3.jpg',
                'location'   => 'hero',
                'sort_order' => 2,
                'is_active'  => true,
            ],
            [
                'title'      => 'Capacity Building & Training',
                'subtitle'   => 'Workshops, short courses, and mentorship on EHRs, data standards, privacy, and data-driven decision-making.',
                'image_path' => 'assets/img/P1.jpg',
                'location'   => 'hero',
                'sort_order' => 3,
                'is_active'  => true,
            ],
            // About slides
            [
                'title'      => 'Our Mission',
                'subtitle'   => 'To champion the safe, ethical, and effective use of ICT to improve health outcomes for all people in Botswana.',
                'image_path' => 'assets/img/about3.jpeg',
                'location'   => 'about',
                'sort_order' => 1,
                'is_active'  => true,
            ],
            [
                'title'      => 'Our Vision',
                'subtitle'   => 'A Botswana where every health decision is informed by accurate, timely, and accessible health data.',
                'image_path' => 'assets/img/about2.jpeg',
                'location'   => 'about',
                'sort_order' => 2,
                'is_active'  => true,
            ],
            [
                'title'      => 'Digital Health Community',
                'subtitle'   => 'Connecting professionals who are shaping the future of health information systems in Botswana.',
                'image_path' => 'assets/img/bg-img.jpeg',
                'location'   => 'about',
                'sort_order' => 3,
                'is_active'  => true,
            ],
            [
                'title'      => 'Innovation in Practice',
                'subtitle'   => 'Supporting applied research, pilot projects, and knowledge sharing across the health sector.',
                'image_path' => 'assets/img/bgimg.jpeg',
                'location'   => 'about',
                'sort_order' => 4,
                'is_active'  => true,
            ],
        ];

        foreach ($slides as $s) {
            Slide::create($s);
        }

        $this->command->info('Seeded ' . count($slides) . ' slides.');
    }
}