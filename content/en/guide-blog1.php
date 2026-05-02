<?php
return [
    'services_hero' => [
        'image' => 'assets/img/home/image(0).jpg',
        'style' => ''
    ],
    'info_section' => [
        'head' => [
            'title' => 'Germany is one of the top preferred study destinations for many international students',
            'desc' => 'Currently, among 2.7 million students studying at German universities, there are more than 380,000 international students - including many Arab students. Based on the latest reports, this number is increasing steadily every year.'
        ],
        'notes_section' => [
            'title' => 'Very Important Notes',
            'wrapper_class' => 'advice-stars my-5',
            'items' => [
                [
                    'type' => 'complex',
                    'title' => 'German universities have different application deadlines, usually for Winter and Summer semesters:',
                    'content' => '
                        <p><span class="fw-bold">Winter Semester:</span> The application process starts in March, the deadline is July 15th, and the semester begins in October.</p>
                        <p><span class="fw-bold">Summer Semester:</span> The application process starts in September, the deadline is January 15th, and the semester begins in March / April.</p>'
                ],
                [
                    'type' => 'text',
                    'content' => 'Please take into account that the process of university registration and preparing the necessary visa documents takes at least two to four months depending on the case. Therefore, we strongly advise starting the registration procedures early.'
                ],
                [
                    'type' => 'list',
                    'title' => 'To answer the most frequently asked questions by students:',
                    'list_items' => [
                        'The required documents for university admission depend heavily on the degree you want to obtain. For a Bachelor’s degree: certified high school diploma, CV, Motivation Letter, passport copy, and German language certificate. For a Master’s degree: recognized Bachelor’s degree, German or English language certificate, CV, and Motivation Letter.',
                        'To learn about <span style="text-decoration: underline; color: #66aaee;">study visa requirements</span> at the German embassy, we have collected valuable information at the bottom of the page.'
                    ]
                ]
            ]
        ]
    ],
    'why_germany' => [
        'title' => 'Why Study in Germany?',
        'subtitle' => 'It is an ideal environment for ambitious students from all over the world to build a strong academic and professional future.',
        'cards' => [
            ['title' => 'World-Class Education', 'text' => 'Prestigious German universities and internationally recognized academic programs.', 'icon' => 'assets/img/education/edu-services1.png'],
            ['title' => 'Internationally Recognized Degrees', 'text' => 'Studying in Germany guarantees a recognized degree and successful career opportunities.', 'icon' => 'assets/img/education/edu-services2.png'],
            ['title' => 'Practical Training', 'text' => 'German education combines theoretical learning with practical training in real companies.', 'icon' => 'assets/img/education/edu-services3.png'],
            ['title' => 'Diverse Specializations', 'text' => 'German institutes offer thousands of programs to suit all student interests.', 'icon' => 'assets/img/education/edu-services4.png'],
            ['title' => 'Low Tuition Fees', 'text' => 'Nominal fees at public universities, even for international students.', 'icon' => 'assets/img/education/edu-services5.png'],
            ['title' => 'Explore Europe', 'text' => 'A student visa allows you to stay in Germany and travel freely within Europe.', 'icon' => 'assets/img/education/edu-services6.png'],
            ['title' => 'Study in English or German', 'text' => 'Germany offers thousands of study programs in English for all students.', 'icon' => 'assets/img/education/edu-services7.png'],
            ['title' => 'Work While Studying', 'text' => 'Living costs are reasonable, and you can work while studying to support yourself.', 'icon' => 'assets/img/education/edu-services8.png'],
            ['title' => 'Post-Graduation Jobs', 'text' => 'After graduation, you can stay in Germany for a period to search for a job.', 'icon' => 'assets/img/education/edu-services9.png'],
            ['title' => 'Safe & Stable Country', 'text' => 'Germany is a very safe country, allowing you to move freely without fear.', 'icon' => 'assets/img/education/edu-services8.png'],
            ['title' => 'Learn German = More Chances', 'text' => 'German is close to English and increases your study and work opportunities.', 'icon' => 'assets/img/education/edu-services11.png'],
            ['title' => 'Rich Culture', 'text' => 'A diverse society, international friendships, and a unique life experience.', 'icon' => 'assets/img/education/edu-services12.png'],
        ]
    ],
    'timeline' => [
        'title' => 'Your Journey to Germany Step by Step with BCS',
        'desc' => 'We guide you from the first consultation until you settle in Germany — here is how the process works with us.',
        'steps' => [
            [
                'id' => '01',
                'num_img' => 'Group1.png',
                'icon' => 'Grouptime1.png',
                'title' => 'Initial Consultation',
                'sub_title' => 'Mapping your educational path',
                'desc' => 'We help you choose the right major and university based on your academic goals.',
                'dot_color' => 'bg-blue'
            ],
            [
                'id' => '02',
                'num_img' => 'Group2.png',
                'icon' => 'Grouptime2.png',
                'title' => 'Document Preparation',
                'sub_title' => 'Perfecting your application file',
                'desc' => 'Translation, certification, CV formatting, and writing a strong motivation letter.',
                'dot_color' => 'bg-green'
            ],
            [
                'id' => '03',
                'num_img' => 'Group3.png',
                'icon' => 'Grouptime3.png',
                'title' => 'Applying to Universities',
                'sub_title' => 'Securing your admission',
                'desc' => 'We select the best universities and manage your applications and follow-ups.',
                'dot_color' => 'bg-yellow'
            ],
            [
                'id' => '04',
                'num_img' => 'Group4.png',
                'icon' => 'Grouptime4.png',
                'title' => 'Visa Support',
                'sub_title' => 'Ensuring interview readiness',
                'desc' => 'Preparing your visa file and guiding you through official embassy procedures.',
                'dot_color' => 'bg-orange'
            ],
            [
                'id' => '05',
                'num_img' => 'Group5.png',
                'icon' => 'Grouptime5.png',
                'title' => 'Arrival & Settlement',
                'sub_title' => 'Arranging your new life',
                'desc' => 'Airport pickup, housing, city registration, and opening a bank account.',
                'dot_color' => 'bg-orange'
            ],
            [
                'id' => '06',
                'num_img' => 'Group6.png',
                'icon' => 'Grouptime6.png',
                'title' => 'Post-Arrival Support',
                'sub_title' => 'Staying by your side',
                'desc' => 'Ongoing support including academic follow-up and solving any challenges you face.',
                'dot_color' => 'bg-red'
            ]
        ]
    ]
];