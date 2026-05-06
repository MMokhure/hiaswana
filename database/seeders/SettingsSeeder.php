<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [

            // ── General ──────────────────────────────────────────────────────
            ['group' => 'general', 'key' => 'site_name',            'label' => 'Site Name',                  'value' => 'HIASWANA',                                    'type' => 'text',     'sort_order' => 1],
            ['group' => 'general', 'key' => 'site_tagline',         'label' => 'Site Tagline',               'value' => 'Health Informatics Association of Botswana',  'type' => 'text',     'sort_order' => 2],
            ['group' => 'general', 'key' => 'site_description',     'label' => 'Site Meta Description',      'value' => 'Advancing digital health and health informatics in Botswana.', 'type' => 'textarea', 'sort_order' => 3],
            ['group' => 'general', 'key' => 'join_cta_label',       'label' => 'Header Join Button Label',   'value' => 'Join HIASWANA',                               'type' => 'text',     'sort_order' => 4],

            // ── Contact ───────────────────────────────────────────────────────
            ['group' => 'contact', 'key' => 'contact_address',      'label' => 'Address',                    'value' => 'Gaborone, Botswana',                          'type' => 'text',     'sort_order' => 1],
            ['group' => 'contact', 'key' => 'contact_map_url',      'label' => 'Map URL',                    'value' => 'https://www.google.com/maps?q=Gaborone,+Botswana', 'type' => 'url',  'sort_order' => 2],
            ['group' => 'contact', 'key' => 'contact_email',        'label' => 'Email',                      'value' => 'info@hiaswana.co.bw',                         'type' => 'email',    'sort_order' => 3],
            ['group' => 'contact', 'key' => 'contact_phone',        'label' => 'Phone',                      'value' => '+267 71 234 567',                             'type' => 'tel',      'sort_order' => 4],
            ['group' => 'contact', 'key' => 'contact_hours',        'label' => 'Opening Hours',              'value' => 'Mon–Sat: 8:00 AM – 5:00 PM',                 'type' => 'text',     'sort_order' => 5],
            ['group' => 'contact', 'key' => 'contact_page_intro',   'label' => 'Contact Page Intro Text',   'value' => 'We\'re here to help. Contact HIASWANA for membership, collaboration opportunities, or general enquiries — our team responds promptly during working hours.', 'type' => 'textarea', 'sort_order' => 6],

            // ── Social Media ─────────────────────────────────────────────────
            ['group' => 'social',  'key' => 'social_facebook',      'label' => 'Facebook URL',               'value' => '#',                                           'type' => 'url',      'sort_order' => 1],
            ['group' => 'social',  'key' => 'social_twitter',       'label' => 'Twitter / X URL',            'value' => '#',                                           'type' => 'url',      'sort_order' => 2],
            ['group' => 'social',  'key' => 'social_instagram',     'label' => 'Instagram URL',              'value' => '#',                                           'type' => 'url',      'sort_order' => 3],
            ['group' => 'social',  'key' => 'social_linkedin',      'label' => 'LinkedIn URL',               'value' => '#',                                           'type' => 'url',      'sort_order' => 4],
            ['group' => 'social',  'key' => 'social_youtube',       'label' => 'YouTube URL',                'value' => '#',                                           'type' => 'url',      'sort_order' => 5],

            // ── Homepage Hero ─────────────────────────────────────────────────
            ['group' => 'homepage', 'key' => 'hero_title',           'label' => 'Hero Title',                'value' => 'Building a Connected, Data‑Driven Health System', 'type' => 'text',   'sort_order' => 1],
            ['group' => 'homepage', 'key' => 'hero_description',     'label' => 'Hero Description',          'value' => 'We bring together clinicians, technologists, academics, and policymakers to strengthen digital health and health information systems across Botswana.', 'type' => 'textarea', 'sort_order' => 2],
            ['group' => 'homepage', 'key' => 'hero_cta1_label',      'label' => 'Hero CTA 1 Label',          'value' => 'Get in touch',                                'type' => 'text',     'sort_order' => 3],
            ['group' => 'homepage', 'key' => 'hero_cta2_label',      'label' => 'Hero CTA 2 Label',          'value' => 'Community Activities',                        'type' => 'text',     'sort_order' => 4],
            ['group' => 'homepage', 'key' => 'hero_cta2_sub',        'label' => 'Hero CTA 2 Sub-label',      'value' => 'Workshops & trainings, Conference, webinars, forums', 'type' => 'text', 'sort_order' => 5],

            // ── Homepage About ────────────────────────────────────────────────
            ['group' => 'homepage', 'key' => 'about_subheading',     'label' => 'About Subheading',          'value' => 'ABOUT US',                                    'type' => 'text',     'sort_order' => 10],
            ['group' => 'homepage', 'key' => 'about_heading',        'label' => 'About Heading',             'value' => 'Our Work Promise To Uphold The Trust Placed', 'type' => 'text',     'sort_order' => 11],
            ['group' => 'homepage', 'key' => 'about_description',    'label' => 'About Description',         'value' => 'We are a multidisciplinary community of health professionals, ICT experts, researchers, and students dedicated to advancing biomedical and health informatics in Botswana and the region. Inspired by global bodies such as the International Medical Informatics Association (IMIA) and the Pan‑African Health Informatics Association (HELINA), we promote the safe, ethical, and effective use of information and communication technologies to improve health for all.', 'type' => 'textarea', 'sort_order' => 12],
            ['group' => 'homepage', 'key' => 'about_stat1_number',   'label' => 'Stat 1 Number',             'value' => '10+',                                         'type' => 'text',     'sort_order' => 13],
            ['group' => 'homepage', 'key' => 'about_stat1_label',    'label' => 'Stat 1 Label',              'value' => 'YEARS',                                       'type' => 'text',     'sort_order' => 14],
            ['group' => 'homepage', 'key' => 'about_stat2_number',   'label' => 'Stat 2 Number',             'value' => '270+',                                        'type' => 'text',     'sort_order' => 15],
            ['group' => 'homepage', 'key' => 'about_stat2_label',    'label' => 'Stat 2 Label',              'value' => 'MEMBERS',                                     'type' => 'text',     'sort_order' => 16],
            ['group' => 'homepage', 'key' => 'about_stat3_number',   'label' => 'Stat 3 Number',             'value' => '89',                                          'type' => 'text',     'sort_order' => 17],
            ['group' => 'homepage', 'key' => 'about_stat3_label',    'label' => 'Stat 3 Label',              'value' => 'PROJECTS',                                    'type' => 'text',     'sort_order' => 18],
            ['group' => 'homepage', 'key' => 'about_stat4_number',   'label' => 'Stat 4 Number',             'value' => '53+',                                         'type' => 'text',     'sort_order' => 19],
            ['group' => 'homepage', 'key' => 'about_stat4_label',    'label' => 'Stat 4 Label',              'value' => 'EVENTS',                                      'type' => 'text',     'sort_order' => 20],
            ['group' => 'homepage', 'key' => 'about_check1',         'label' => 'About Checklist Item 1',   'value' => 'Health Informatics Leadership & Advocacy',    'type' => 'text',     'sort_order' => 21],
            ['group' => 'homepage', 'key' => 'about_check2',         'label' => 'About Checklist Item 2',   'value' => 'Capacity Building & Professional Development','type' => 'text',     'sort_order' => 22],
            ['group' => 'homepage', 'key' => 'about_check3',         'label' => 'About Checklist Item 3',   'value' => 'Research & Innovation in Digital Health',      'type' => 'text',     'sort_order' => 23],
            ['group' => 'homepage', 'key' => 'about_check4',         'label' => 'About Checklist Item 4',   'value' => 'Collaboration & Knowledge Sharing',           'type' => 'text',     'sort_order' => 24],
            ['group' => 'homepage', 'key' => 'about_badge_number',   'label' => 'Experience Badge Number',  'value' => '10+',                                         'type' => 'text',     'sort_order' => 25],
            ['group' => 'homepage', 'key' => 'about_badge_line1',    'label' => 'Experience Badge Line 1',  'value' => 'YEARS',                                       'type' => 'text',     'sort_order' => 26],
            ['group' => 'homepage', 'key' => 'about_badge_line2',    'label' => 'Experience Badge Line 2',  'value' => 'OF EXPERIENCE',                               'type' => 'text',     'sort_order' => 27],

            // ── Services ──────────────────────────────────────────────────────
            ['group' => 'services', 'key' => 'services_heading',      'label' => 'Services Heading',          'value' => 'Transforming Healthcare Through Digital Innovation', 'type' => 'text', 'sort_order' => 1],
            ['group' => 'services', 'key' => 'services_subheading',   'label' => 'Services Subheading',       'value' => 'OUR CORE INITIATIVES',                        'type' => 'text',     'sort_order' => 2],
            ['group' => 'services', 'key' => 'services_intro',        'label' => 'Services Introduction',     'value' => 'As Botswana\'s leading health informatics association, we unite clinicians, technologists, researchers, and policymakers to build stronger, more connected health systems. Through capacity building, standards advocacy, research, and policy engagement, we empower healthcare professionals to leverage data and technology for better patient outcomes.', 'type' => 'textarea', 'sort_order' => 3],
            ['group' => 'services', 'key' => 'service1_title',        'label' => 'Service 1 Title',           'value' => 'Capacity Building & Training',                'type' => 'text',     'sort_order' => 4],
            ['group' => 'services', 'key' => 'service1_description',  'label' => 'Service 1 Description',    'value' => 'Short courses, workshops, and mentorship on core health informatics topics such as electronic health records, data standards, privacy, and data use for decision‑making.', 'type' => 'textarea', 'sort_order' => 5],
            ['group' => 'services', 'key' => 'service2_title',        'label' => 'Service 2 Title',           'value' => 'Standards & Interoperability',                'type' => 'text',     'sort_order' => 6],
            ['group' => 'services', 'key' => 'service2_description',  'label' => 'Service 2 Description',    'value' => 'Promoting national and international standards (such as ICD, SNOMED CT, HL7 FHIR) to enable safe data exchange between systems and levels of care.', 'type' => 'textarea', 'sort_order' => 7],
            ['group' => 'services', 'key' => 'service3_title',        'label' => 'Service 3 Title',           'value' => 'Research & Innovation',                       'type' => 'text',     'sort_order' => 8],
            ['group' => 'services', 'key' => 'service3_description',  'label' => 'Service 3 Description',    'value' => 'Supporting applied research, pilot projects, and innovation labs that explore new ways to use data, AI, and digital tools to improve clinical care and public health.', 'type' => 'textarea', 'sort_order' => 9],
            ['group' => 'services', 'key' => 'service4_title',        'label' => 'Service 4 Title',           'value' => 'Policy & Advocacy',                           'type' => 'text',     'sort_order' => 10],
            ['group' => 'services', 'key' => 'service4_description',  'label' => 'Service 4 Description',    'value' => 'Engaging with government, partners, and regulators to ensure that digital health investments are ethical, sustainable, and aligned with national health priorities.', 'type' => 'textarea', 'sort_order' => 11],

            // ── Footer ────────────────────────────────────────────────────────
            ['group' => 'footer',   'key' => 'footer_about',          'label' => 'Footer About Text',         'value' => 'Botswana\'s premier health informatics association, uniting clinicians, technologists, researchers, and policymakers to advance digital health and strengthen health information systems nationwide.', 'type' => 'textarea', 'sort_order' => 1],
            ['group' => 'footer',   'key' => 'footer_tagline',        'label' => 'Footer Tagline (Band)',      'value' => 'ADVANCING DIGITAL HEALTH & HEALTH INFORMATICS IN BOTSWANA ❤️', 'type' => 'text', 'sort_order' => 2],
            ['group' => 'footer',   'key' => 'footer_copyright',      'label' => 'Copyright Text',            'value' => '© HIASWANA | ALL RIGHTS RESERVED',            'type' => 'text',     'sort_order' => 3],
            ['group' => 'footer',   'key' => 'footer_newsletter_heading', 'label' => 'Newsletter Heading',    'value' => 'Stay Informed',                               'type' => 'text',     'sort_order' => 4],
            ['group' => 'footer',   'key' => 'footer_newsletter_sub',     'label' => 'Newsletter Sub-text',   'value' => 'Get updates on events, publications, and opportunities in health informatics.', 'type' => 'textarea', 'sort_order' => 5],

            // ── Pages ─────────────────────────────────────────────────────────
            ['group' => 'pages',    'key' => 'page_about_title',       'label' => 'About Page Hero Title',     'value' => 'HIASWANA',                                    'type' => 'text',     'sort_order' => 1],
            ['group' => 'pages',    'key' => 'page_about_subtitle',    'label' => 'About Page Hero Subtitle',  'value' => 'First Health Informatics Association in Botswana.', 'type' => 'textarea', 'sort_order' => 2],
            ['group' => 'pages',    'key' => 'page_about_mission',     'label' => 'About Page Mission',        'value' => 'To champion the safe, ethical, and effective use of information and communication technologies to improve health outcomes for all people in Botswana and the region.', 'type' => 'textarea', 'sort_order' => 3],
            ['group' => 'pages',    'key' => 'page_events_title',      'label' => 'Events Page Hero Title',    'value' => 'Community Activities',                        'type' => 'text',     'sort_order' => 10],
            ['group' => 'pages',    'key' => 'page_events_subtitle',   'label' => 'Events Page Hero Subtitle', 'value' => 'Stay up to date with HIASWANA meetings, workshops, webinars, conferences, and forums focused on digital health and health informatics.', 'type' => 'textarea', 'sort_order' => 11],
            ['group' => 'pages',    'key' => 'page_team_title',        'label' => 'Team Page Hero Title',      'value' => 'Our Team',                                    'type' => 'text',     'sort_order' => 20],
            ['group' => 'pages',    'key' => 'page_team_subtitle',     'label' => 'Team Page Hero Subtitle',   'value' => 'HIASWANA is led by volunteers from health, ICT, academia, and development partners who are passionate about using data and technology to improve health.', 'type' => 'textarea', 'sort_order' => 21],
            ['group' => 'pages',    'key' => 'page_team_section_heading', 'label' => 'Team Section Heading',  'value' => 'Leadership & Coordination',                   'type' => 'text',     'sort_order' => 22],
            ['group' => 'pages',    'key' => 'page_pubs_title',        'label' => 'Publications Hero Title',   'value' => 'Publications',                                'type' => 'text',     'sort_order' => 30],
            ['group' => 'pages',    'key' => 'page_pubs_subtitle',     'label' => 'Publications Hero Subtitle','value' => 'A space to showcase reports, guidelines, case studies, and research outputs related to health informatics and digital health in Botswana.', 'type' => 'textarea', 'sort_order' => 31],
            ['group' => 'pages',    'key' => 'page_pubs_heading',      'label' => 'Publications Section Heading', 'value' => 'Featured Publications',                   'type' => 'text',     'sort_order' => 32],
            ['group' => 'pages',    'key' => 'page_membership_title',  'label' => 'Membership Hero Title',     'value' => 'Join HIASWANA',                               'type' => 'text',     'sort_order' => 40],
            ['group' => 'pages',    'key' => 'page_membership_subtitle','label' => 'Membership Hero Subtitle', 'value' => 'Connect with a growing community of health informatics professionals, students, and partners shaping digital health in Botswana.', 'type' => 'textarea', 'sort_order' => 41],
            ['group' => 'pages',    'key' => 'page_contact_intro',     'label' => 'Contact Page Intro',        'value' => 'Get in touch with the HIASWANA team for membership, partnership, or general enquiries.', 'type' => 'textarea', 'sort_order' => 50],
        ];

        foreach ($settings as $s) {
            Setting::updateOrCreate(['key' => $s['key']], $s);
        }

        Setting::flush();
    }
}
