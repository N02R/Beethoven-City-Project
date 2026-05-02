<?php
return [
    'breadcrumb' => [
        'home' => 'الرئيسية',
        'parent' => 'التعليم العالي',
        'current' => 'العروض والاتفاقيات'
    ],
    'services_hero' => [
        'image' => 'assets/img/education/servicesimg10.png',
        'style' => ''
    ],
    'info_section' => [
        'head' => [
            'title' => 'العروض والاتفاقيات',
            'desc' => 'كل عرض له تكلفة خدمة خاصة به تتضمن إجراءات ومراسلات مختلفة. للحصول على فكرة عامة، تجد أدناه العروض الأكثر طلباً.'
        ],
        'notes_section' => [
            'title' => 'ملاحظات هامة !!',
            'wrapper_class' => 'advice-stars py-5',
            'items' => [
                'جميع العروض والاتفاقيات تكتب وتملأ باللغة الإنجليزية، للإستفسار لا تتردد <span class="fw-bold" style="color: #66aeee;">بالتواصل معنا</span>.'
            ]
        ],
        // مصفوفة الحزم (Cards)
        'packages_list' => [
            [
                'title' => 'بكالوريس',
                'desc' => 'حزمة واتفاقية البكالوريس',
                'link' => '/edu-services/BCS-bachelor.html',
                'active' => false
            ],
            [
                'title' => 'الماجستير',
                'desc' => 'حزمة واتفاقية الماجستير',
                'link' => '#',
                'active' => true // الكارت المميز
            ],
            [
                'title' => 'الدكتوراه',
                'desc' => 'حزمة واتفاقية الدكتوراه',
                'link' => '#',
                'active' => false
            ]
        ]
    ]
];