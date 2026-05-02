<?php
/**
 * Studienkolleg (Foundation Year) Page Content - English Version
 */

return [
    'breadcrumb' => [
        'home' => 'Home',
        'parent' => 'Higher Education',
        'current' => 'Foundation Course / Studienkolleg'
    ],
    'services_hero' => [
        'image' => 'assets/img/education/serviceimg11.png',
        'style' => 'background-position: center -20rem;'
    ],
    'info_section' => [
        'head' => [
            'title' => 'Foundation Course / "Studienkolleg"',
            'desc' => 'The foundation year (Studienkolleg) is an academic program that acts as a bridge between your high school diploma and the admission requirements of German universities. It is mandatory if your school-leaving certificate is not equivalent to the German Abitur.'
        ],
        // 1. Course Goals (Check System)
        'goals' => [
            'title' => 'Goals of the Foundation Course',
            'wrapper_class' => 'advice-check py-5',
            'column_class' => 'col-lg-6 col-md-6 col-sm-12',
            'items' => [
                'Equating educational qualifications with German university admission requirements',
                'Improving academic German language skills',
                'Preparing you with specialized subjects related to your university field',
                'Qualification to pass the University Qualification Exam (FSP)'
            ]
        ],
        // 2. Learning Info (Paragraphs)
        'learning_info' => [
            'title' => 'What does a student study during the foundation year?',
            'intro' => 'The foundation year prepares the student through two semesters for the "Academic Specialization" in two main areas:',
            'points' => [
                'First: German language program, so the student does not face linguistic difficulties during university studies.',
                'Second: Technical or scientific aspects. It is essential to master the relevant sciences for your chosen degree.'
            ]
        ],
        // 3. Course Types (Star System)
        'course_types' => [
            'title' => 'Types of Foundation Courses',
            'title_class' => 'advice-text',
            'wrapper_class' => 'advice-stars my-5',
            'column_class' => 'col-lg-4 col-md-6 col-sm-12',
            'items' => [
                'M‑Kurs: Medicine, Biology, Pharmacy',
                'T‑Kurs: Engineering, Mathematics, Physics',
                'S‑Kurs: Languages',
                'W‑Kurs: Management, Economics, Social Sciences',
                'G‑Kurs: History, Literature, Statistics'
            ]
        ],
        // 4. University Differences
        'uni_diff' => [
            'title' => 'Differences between Public Universities and Applied Sciences Universities?',
            'desc' => 'The foundation year is linked either to general universities or to universities of applied sciences (Fachhochschulen).',
            'public' => 'General Universities: Qualify you to study at all German universities, including applied sciences.',
            'applied' => 'Applied Sciences Universities: Qualify you to study at most Fachhochschulen only, excluding general universities.'
        ],
        // 5. Types of Studienkolleg
        'types_info' => [
            'title' => 'Types of Foundation Years in Germany',
            'gov' => '1. Public Studienkolleg: Supervised by universities, almost free (fees between €150–300). Admission requires passing a competitive entrance exam.',
            'private' => '2. Private Studienkolleg: A suitable alternative if not admitted to public ones. No entrance exam usually, but higher costs (€1800–3000 per semester).'
        ],
        // 6. Important Notes (Star System)
        'important_notes' => [
            'title' => 'Important Notes!!',
            'title_class' => 'note-text',
            'wrapper_class' => 'advice-stars',
            'column_class' => 'col-12',
            'items' => [
                'Choose the appropriate foundation course for your major.',
                'Check the validity of your certificate for the desired specialization.',
                'Ensure whether the certificate qualifies you for all universities or just applied sciences.'
            ]
        ],
        // 7. Exams
        'exams' => [
            'aufnahmeprufung' => [
                'title' => 'Entrance Exam (Aufnahmeprüfung)',
                'text' => 'To join public Studienkollegs, you must pass a competitive exam. It usually requires B2 level in German (sometimes B1) and covers language and mathematics.'
            ],
            'fsp' => [
                'title' => 'Duration and Final Evaluation (Feststellungsprüfung - FSP)',
                'text' => 'It takes two semesters. At the end, the student takes the FSP exam, which qualifies them for university. Results range from 1.0 (Excellent) to 5.0 (Fail).'
            ]
        ],
        // 8. Pre-apply Tips (Check System)
        'pre_apply_tips' => [
            'title' => 'Important Tips Before Applying',
            'wrapper_class' => 'advice-check py-5',
            'column_class' => 'col-lg-6 col-md-6 col-sm-12',
            'items' => [
                'Ensure you are eligible for the correct course for your major.',
                'Verify if the certificate is recognized in public or applied universities.',
                'Confirm the certificate remains valid for the desired major after the course.',
                'Prepare yourself well to pass the entrance exam.'
            ]
        ]
    ]
];