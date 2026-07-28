<?php

namespace Database\Seeders;

use App\Models\Publication;
use Illuminate\Database\Seeder;

class PublicationSeeder extends Seeder
{
    public function run(): void
    {
        $publications = [
            [
                'title'       => 'eHealth readiness of health care institutions and users in Botswana',
                'description' => 'Journal of the International Society for Telemedicine and eHealth, 2(1), 43–49.',
                'author'      => 'Mauco KL',
                'year'        => '2014',
                'type'        => 'Link',
                'status'      => 'published',
            ],
            [
                'title'       => 'e-Waste management as an indicator of e-health readiness: An overview of the Botswana landscape',
                'description' => 'Proceedings of the 4th IASTED International Conference on Health Informatics (Africa HI 2016), Gaborone, Botswana, 5–7 September 2016.',
                'author'      => 'Mauco KL, Scott RE, & Mars M',
                'year'        => '2016',
                'type'        => 'Link',
                'status'      => 'published',
            ],
            [
                'title'       => 'Telemedicine in low resource settings: A case for Botswana',
                'description' => 'In Kgomotso H. Moahi, Kelvin J. Bwalya, & Peter Mazebe II Sebina (Eds.), Health information systems and the advancement of medical practice in developing countries (pp. 129–148). IGI Global, Pennsylvania, USA.',
                'author'      => 'Ndlovu K, Mauco KL, & Littman-Quinn R',
                'year'        => '2017',
                'type'        => 'Link',
                'status'      => 'published',
            ],
            [
                'title'       => 'Critical analysis of e-health readiness assessment frameworks: Suitability for application in developing countries',
                'description' => 'Journal of Telemedicine and Telecare, 24(2), 110–117.',
                'author'      => 'Mauco KL, Scott RE, Mars M',
                'year'        => '2018',
                'type'        => 'Link',
                'status'      => 'published',
            ],
            [
                'title'       => 'Development of an eHealth readiness assessment framework for Botswana and other developing countries: Interview study',
                'description' => 'JMIR Medical Informatics, 7:e12949. doi: 10.2196/12949.',
                'author'      => 'Mauco KL, Scott RE, Mars M',
                'year'        => '2019',
                'type'        => 'Link',
                'status'      => 'published',
            ],
            [
                'title'       => 'Validation of an e-health readiness assessment framework for developing countries',
                'description' => 'BMC Health Services Research, 20(1):575. doi:10.1186/s12913-020-05448-3.',
                'author'      => 'Mauco KL, Scott RE, Mars M',
                'year'        => '2020',
                'type'        => 'Link',
                'status'      => 'published',
            ],
            [
                'title'       => 'Development of a conceptual framework for e-health readiness assessment in the context of developing countries',
                'description' => 'In Telehealth Innovations in Remote Healthcare Services Delivery. IOS Press.',
                'author'      => 'Mauco KL, Scott RE, Mars M',
                'year'        => '2021',
                'type'        => 'Link',
                'status'      => 'published',
            ],
            [
                'title'       => 'Acceptance of the district health information system version 2 platform for malaria case-based surveillance by healthcare workers in Botswana',
                'description' => 'JMIR Formative Research, 6(3):e32722. doi:10.2196/32722.',
                'author'      => 'Ndlovu K, Mauco KL, Keetile M et al.',
                'year'        => '2022',
                'type'        => 'Link',
                'status'      => 'published',
            ],
            [
                'title'       => 'Assessment of stakeholder perceptions and attitudes toward health data governance principles in Botswana: Web-based survey',
                'description' => 'JMIR Formative Research, 7:e41408. doi:10.2196/41408.',
                'author'      => 'Ndlovu K, Mauco KL, Chibemba S et al.',
                'year'        => '2023',
                'type'        => 'Link',
                'status'      => 'published',
            ],
            [
                'title'       => 'Experiences, lessons, and challenges with adapting REDCap for COVID-19 laboratory data management in a resource-limited country: Descriptive study',
                'description' => 'JMIR Formative Research, 8:e50897. doi:10.2196/50897.',
                'author'      => 'Ndlovu K, Mauco KL, Makhura O et al.',
                'year'        => '2024',
                'type'        => 'Link',
                'status'      => 'published',
            ],
            [
                'title'       => 'Gaps and pathways to success in global health informatics academic collaborations: Reflecting on current practices',
                'description' => 'JMIR Medical Informatics, 13, e67326. doi:10.2196/67326.',
                'author'      => 'Campbell EA, Holl F, Bear Don\'t Walk IV OJ, Mosesane B, Kanter AS, Fraser H, Joseph AL, Gichoya JW, Mauco KL, Craig S',
                'year'        => '2025',
                'type'        => 'Link',
                'status'      => 'published',
            ],
            [
                'title'       => 'Experts\' opinion on sustainable use of digital health tools for effective future pandemic preparedness and response: Questionnaire study',
                'description' => 'JMIR Public Health and Surveillance, 12, e84164. doi:10.2196/84164.',
                'author'      => 'Mauco KL, Holmes JH, Luberti A, Mosesane B',
                'year'        => '2026',
                'type'        => 'Link',
                'status'      => 'published',
            ],
        ];

        foreach ($publications as $pub) {
            Publication::create($pub);
        }

        $this->command->info('Seeded ' . count($publications) . ' publications.');
    }
}