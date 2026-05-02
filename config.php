<?php

return [
    // إعدادات الموقع العامة
    'site_name' => 'بيتهوفن سيتي',
    'base_url'  => 'http://localhost/beethoven-city-website/',

    // الإعدادات الافتراضية للـ SEO
    'default_title' => [
        'ar' => 'بيتهوفن سيتي للخدمات التعليمية والتدريب المهني في ألمانيا',
        'en' => 'Beethoven City for Education and Vocational Training in Germany'
    ],
    'default_description' => [
        'ar' => 'شريكك الموثوق للدراسة والتدريب المهني في ألمانيا - نرافقك من القبول حتى الوصول.',
        'en' => 'Your trusted partner for study and vocational training in Germany - from admission to arrival.'
    ],

    /**
     * إعدادات الصفحات
     */
    'pages' => [
        'home' => [
            'title' => [
                'ar' => 'الرئيسية - بيتهوفن سيتي للخدمات',
                'en' => 'Home - Beethoven City Services'
            ],
            'description' => [
                'ar' => 'مرحباً بك في بيتهوفن سيتي، وجهتك الأولى للقبول الجامعي والتدريب المهني (Ausbildung) في ألمانيا.',
                'en' => 'Welcome to Beethoven City, your first destination for university admissions and vocational training in Germany.'
            ],
        ],
        'about' => [
            'title' => [
                'ar' => 'عن الشركة - قصتنا ورؤيتنا',
                'en' => 'About Us - Our Story and Vision'
            ],
            'description' => [
                'ar' => 'تعرف على قصة بيتهوفن سيتي، رؤيتنا، ورسالتنا في دعم الطلاب العرب لتحقيق أحلامهم في ألمانيا.',
                'en' => 'Learn about Beethoven City\'s story, vision, and mission in supporting Arab students to achieve their dreams in Germany.'
            ],
            'css' => ['about.css', 'responsive-about.css', 'swiper-bundle.min.css']
        ],
        'education' => [
            'title' => [
                'ar' => 'التعليم العالي والقبول الجامعي في ألمانيا',
                'en' => 'Higher Education and University Admission in Germany'
            ],
            'description' => [
                'ar' => 'كل ما تحتاجه عن القبول الجامعي، دراسة اللغة، وشروط الدراسة في ألمانيا للطلاب الدوليين.',
                'en' => 'Everything you need about university admissions, language study, and requirements for international students in Germany.'
            ],
            'css' => ['education.css', 'responsive-education.css']
        ],
        'job' => [
            'title' => [
                'ar' => 'التدريب المهني (Ausbildung) في ألمانيا',
                'en' => 'Vocational Training (Ausbildung) in Germany'
            ],
            'description' => [
                'ar' => 'اكتشف فرص التدريب المهني في ألمانيا، المتطلبات، وكيفية التقديم للحصول على مهنة المستقبل.',
                'en' => 'Discover vocational training opportunities in Germany, requirements, and how to apply for your future career.'
            ],
            'css' => ['education.css', 'responsive-education.css']
        ],

        // --- قسم خدمات التعليم (الـ 20 صفحة تبدأ من هنا) ---

        'arrival' => [
            'title' => [
                'ar' => 'الإستقبال والمواصلات والسكن في ألمانيا',
                'en' => 'Airport Pickup, Transport & Accommodation'
            ],
            'description' => [
                'ar' => 'خدمات الاستقبال من المطار وتأمين السكن للطلاب الواصلين حديثاً إلى ألمانيا.',
                'en' => 'Airport pickup and accommodation services for students newly arriving in Germany.'
            ],
            'css' => ['edu-services.css']
        ],

        'check' => [
            'title' => [
                'ar' => 'تحقق من شهاداتك التعليمية - بيتهوفن سيتي',
                'en' => 'Check Your Educational Certificates - Beethoven City'
            ],
            'description' => [
                'ar' => 'خدمة فحص ومعادلة الشهادات التعليمية للطلاب الراغبين بالدراسة في ألمانيا.',
                'en' => 'Service for checking and evaluating educational certificates for students wishing to study in Germany.'
            ],
            'css' => ['edu-services.css']
        ],

        'BCS-bachelor' => [
            'title' => [
                'ar' => 'حزمة بكالوريوس BCS - محمي',
                'en' => 'BCS Bachelor Package - Protected'
            ],
            'description' => [
                'ar' => 'صفحة محمية بكلمة مرور خاصة باتفاقيات البكالوريوس في بيتهوفن سيتي.',
                'en' => 'Password protected page for BCS Bachelor agreements and templates.'
            ],
            'css' => ['edu-services.css']
        ],

        'courses' => [
            'title' => [
                'ar' => 'الدورات التحضيرية للغة الألمانية - بيتهوفن سيتي',
                'en' => 'German Language Preparatory Courses - Beethoven City'
            ],
            'description' => [
                'ar' => 'معلومات عن الدورات التحضيرية لشهادات DSH و TestDaf في ألمانيا والتكاليف وأماكن الالتحاق.',
                'en' => 'Information about preparatory courses for DSH and TestDaf in Germany, costs, and locations.'
            ],
            'css' => ['edu-services.css']
        ],

        'coverletter' => [
            'title' => [
                'ar' => 'خطاب الطلب الاحترافي - بيتهوفن سيتي',
                'en' => 'Professional Cover Letter - Beethoven City'
            ],
            'description' => [
                'ar' => 'تعرف على كيفية كتابة خطاب طلب (Cover Letter) احترافي للسفارة الألمانية مع نماذج جاهزة للتحميل.',
                'en' => 'Learn how to write a professional Cover Letter for the German embassy with ready-to-download templates.'
            ],
            'css' => ['edu-services.css']
        ],

        'cv' => [
            'title' => [
                'ar' => 'السيرة الذاتية الاحترافية CV - بيتهوفن سيتي',
                'en' => 'Professional Curriculum Vitae (CV) - Beethoven City'
            ],
            'description' => [
                'ar' => 'تعرف على كيفية كتابة سيرة ذاتية (CV) احترافية توافق المعايير الألمانية مع نصائح ذهبية ونماذج جاهزة للتحميل.',
                'en' => 'Learn how to write a professional CV according to German standards with expert tips and ready-to-download templates.'
            ],
            'css' => ['edu-services.css']
        ],
        'englishlang' => [
            'title' => [
                'ar' => 'الدراسة باللغة الإنجليزية في ألمانيا - بيتهوفن سيتي',
                'en' => 'Study in English in Germany - Beethoven City'
            ],
            'description' => [
                'ar' => 'تعرف على شروط وبرامج الدراسة باللغة الإنجليزية في الجامعات الألمانية، متطلبات الآيلتس والتوفل وكيفية التقديم.',
                'en' => 'Learn about English-taught programs in German universities, IELTS/TOEFL requirements, and application procedures.'
            ],
            'css' => ['edu-services.css']
        ],

        'financial' => [
            'title' => [
                'ar' => 'الضمانات المالية والحساب البنكي المغلق في ألمانيا',
                'en' => 'Financial Guarantees & Blocked Account in Germany'
            ],
            'description' => [
                'ar' => 'تعرف على شروط إثبات التمويل المالي للدراسة في ألمانيا، كيفية فتح الحساب البنكي المغلق، ومبالغ الإيداع المطلوبة.',
                'en' => 'Learn about financial proof requirements for studying in Germany, how to open a blocked account, and required deposit amounts.'
            ],
            'css' => ['edu-services.css']
        ],
        'foundation' => [
            'title' => [
                'ar' => 'السنة التحضيرية في ألمانيا Studienkolleg - بيتهوفن سيتي',
                'en' => 'Studienkolleg Foundation Year in Germany - Beethoven City'
            ],
            'description' => [
                'ar' => 'دليلك الشامل حول السنة التحضيرية في ألمانيا، أنواع الدورات (M, T, W, G, S)، الفرق بين الحكومي والخاص، وامتحان الـ FSP.',
                'en' => 'Your guide to the foundation year in Germany, course types (M, T, W, G, S), public vs private, and the FSP exam.'
            ],
            'css' => ['edu-services.css']
        ],
        'general' => [
            'title' => [
                'ar' => 'قائمة متطلبات التأشيرة - بيتهوفن سيتي',
                'en' => 'General Visa Requirements Checklist - Beethoven City'
            ],
            'description' => [
                'ar' => 'حمل قائمة المراجعة الشاملة لمتطلبات تأشيرات الدراسة، التدريب المهني، والعمل في ألمانيا وتعرف على الوثائق المطلوبة.',
                'en' => 'Download the comprehensive checklist for study, vocational training, and work visa requirements in Germany.'
            ],
            'css' => ['edu-services.css']
        ],
        'germanlang' => [
            'title' => [
                'ar' => 'دورات اللغة الألمانية - بيتهوفن سيتي',
                'en' => 'German Language Courses - Beethoven City'
            ],
            'description' => [
                'ar' => 'اتقن اللغة الألمانية من مستويات A1 حتى C2 مع دوراتنا المعتمدة للدراسة والعمل في ألمانيا.',
                'en' => 'Master German from A1 to C2 with our accredited courses for study and work in Germany.'
            ],
            'css' => ['edu-services.css']
        ],
        'health' => [
            'title' => [
                'ar' => 'التأمين الصحي في ألمانيا للطلاب والزوار - بيتهوفن سيتي',
                'en' => 'Health Insurance in Germany for Students & Visitors - Beethoven City'
            ],
            'description' => [
                'ar' => 'خيارات التأمين الصحي الحكومي والخاص في ألمانيا، الوثائق المطلوبة، وروابط حجز مباشرة عبر Dr.WALTER و FINTIBA.',
                'en' => 'Public and private health insurance options in Germany, required documents, and direct booking links via Dr.WALTER and FINTIBA.'
            ],
            'css' => ['edu-services.css']
        ],
        'living' => [
            'title' => [
                'ar' => 'تكلفة المعيشة والسكن في ألمانيا للطلاب - بيتهوفن سيتي',
                'en' => 'Cost of Living & Housing in Germany for Students - Beethoven City'
            ],
            'description' => [
                'ar' => 'دليل شامل حول مصاريف المعيشة شهرياً في ألمانيا، نصائح لتقليل النفقات، ومعلومات حول تأمين السكن (Kaution).',
                'en' => 'Comprehensive guide on monthly living expenses in Germany, tips for saving money, and housing deposit (Kaution) information.'
            ],
            'css' => ['edu-services.css']
        ],
        'motivitionletter' => [
            'title' => [
                'ar' => 'كيفية كتابة خطاب الدافع لألمانيا - بيتهوفن سيتي',
                'en' => 'How to Write a Motivation Letter for Germany - Beethoven City'
            ],
            'description' => [
                'ar' => 'تعلم كيفية كتابة خطاب دافع (Motivation Letter) احترافي للسفارة أو الجامعة وحمل نماذج جاهزة بصيغة PDF و Word.',
                'en' => 'Learn how to write a professional motivation letter for embassies or universities and download templates in PDF and Word.'
            ],
            'css' => ['edu-services.css']
        ],
        'pakeges' => [
            'title' => [
                'ar' => 'العروض والاتفاقيات - بيتهوفن سيتي',
                'en' => 'Packages & Agreements - Beethoven City'
            ],
            'description' => [
                'ar' => 'اطلع على حزم الخدمات والاتفاقيات الخاصة بالبكالوريوس، الماجستير، والدكتوراه في ألمانيا.',
                'en' => 'View service packages and agreements for Bachelor, Master, and PhD in Germany.'
            ],
            'css' => ['edu-services.css']
        ],
        'services-cost' => [
            'title' => [
                'ar' => 'قائمة أسعار الخدمات - بيتهوفن سيتي',
                'en' => 'Services Price List - Beethoven City'
            ],
            'description' => [
                'ar' => 'تعرف على التكاليف التقديرية للخدمات التي يقدمها فريق بيتهوفن سيتي للطلبة والمتدربين في ألمانيا.',
                'en' => 'Check the estimated costs for services provided by Beethoven City for students and trainees in Germany.'
            ],
            'css' => ['edu-services.css']
        ],
        'medical-pakeges' => [
            'title' => [
                'ar' => 'عرض واتفاقية التدريب الطبي - بيتهوفن سيتي',
                'en' => 'Medical Training Package & Agreement - Beethoven City'
            ],
            'description' => [
                'ar' => 'اطلع على تفاصيل عرض واتفاقية التدريب الطبي المهني في ألمانيا وحمل النموذج المعتمد.',
                'en' => 'View details of the Medical Training Package and Agreement in Germany and download the template.'
            ],
            'css' => ['edu-services.css'] // سنستخدم نفس ملف التنسيق
        ],
        'medical-traning' => [
            'title' => [
                'ar' => 'عرض وإتفاقية العمل في ألمانيا - بيتهوفن سيتي',
                'en' => 'Job Offer & Agreement in Germany - Beethoven City'
            ],
            'description' => [
                'ar' => 'اطلع على تفاصيل عرض واتفاقيات العمل والبحث عن وظيفة في ألمانيا وحمل النماذج المعتمدة.',
                'en' => 'View details of job offers and search agreements in Germany and download the approved templates.'
            ],
            'css' => ['edu-services.css']
        ],
        'medical' => [
            'title' => [
                'ar' => 'أكثر التخصصات الطبية انتشاراً في ألمانيا - بيتهوفن سيتي',
                'en' => 'Most Popular Medical Specializations in Germany - Beethoven City'
            ],
            'description' => [
                'ar' => 'تعرف على قائمة التخصصات الطبية في ألمانيا، مدة الدراسة، وحمل قائمة التخصصات الأكثر انتشاراً للأطباء الأجانب.',
                'en' => 'Explore the list of medical specializations in Germany, duration of study, and download the list of popular specialities for international doctors.'
            ],
            'css' => ['edu-services.css']
        ],
        'vocational' => [
            'title' => [
                'ar' => 'عروض واتفاقيات التدريب المهني Ausbildung - بيتهوفن سيتي',
                'en' => 'Vocational Training (Ausbildung) Packages - Beethoven City'
            ],
            'description' => [
                'ar' => 'اطلع على تفاصيل عروض وإتفاقيات التدريب والتأهيل المهني (Ausbildung) في ألمانيا وحمل النماذج المعتمدة.',
                'en' => 'Explore Vocational Training (Ausbildung) offers and agreements in Germany and download official templates.'
            ],
            'css' => ['edu-services.css']
        ],
        'guide' => [
            'title' => [
                'ar' => 'دليل بيتهوفن - معلومات تهم المغتربين',
                'en' => 'Beethoven Guide - Information for Expats'
            ],
            'description' => [
                'ar' => 'دليل شامل يحتوي على نصائح ومعلومات تهم كل طالب ومغترب عربي في المدن الألمانية.',
                'en' => 'A comprehensive guide with tips and information for every Arab student and expat in German cities.'
            ],
            'css' => ['responsive-index.css']
        ],
        'guide-blog1' => [
            'title' => [
                'ar' => 'الدراسة في ألمانيا: المواعيد والمتطلبات - بيتهوفن سيتي',
                'en' => 'Studying in Germany: Dates and Requirements - Beethoven City'
            ],
            'description' => [
                'ar' => 'دليل شامل حول مواعيد التقديم للجامعات الألمانية (فصل الشتاء والصيف) والأوراق المطلوبة للحصول على القبول الجامعي.',
                'en' => 'Comprehensive guide on German university application dates (Winter/Summer) and documents required for admission.'
            ],
            'css' => ['edu-services.css', 'responsive-index.css'] 
        ],
        'contact' => [
            'title' => [
                'ar' => 'تواصل معنا - استشارة مجانية',
                'en' => 'Contact Us - Free Consultation'
            ],
            'description' => [
                'ar' => 'فريقنا جاهز للرد على استفساراتكم بخصوص الدراسة والعمل في ألمانيا. تواصل معنا اليوم.',
                'en' => 'Our team is ready to answer your inquiries regarding studying and working in Germany. Contact us today.'
            ],
            'css' => ['contact.css']
        ],
        '404' => [
            'title' => [
                'ar' => 'خطأ 404 - الصفحة غير موجودة',
                'en' => 'Error 404 - Page Not Found'
            ],
            'description' => [
                'ar' => 'عذراً، الصفحة غير موجودة.',
                'en' => 'Sorry, the page does not exist.'
            ],
            
        ]
    ],
];
