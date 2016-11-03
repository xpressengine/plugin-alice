<?php
return [
    'view' => 'theme',
    'setting' => [
        /* 컬러셋 및 레이아웃 설정 */
        'colorset' => [
            '_type' => 'select',
            '_section' => '컬러셋 및 레이아웃 설정',
            'label' => '컬러셋',
            'options' => [
                '' => 'Default',
                'blue-theme' => 'Blue',
                'red-theme' => 'Red',
            ]
            /* for body class*/
        ],
        'contentAreaType' => [
            '_type' => 'select',
            '_section' => '컬러셋 및 레이아웃 설정',
            'label' => '컨텐츠 영역 가로폭 고정',
            'options' => [
                'xe-container-fluid' => '확장(100%)',
                'xe-container' => '고정'
            ]
        ],
        'layout' => [
            '_type' => 'select',
            '_section' => '컬러셋 및 레이아웃 설정',
            'label' => '레이아웃',
            'options' => [
                'main' => '메인페이지용',
                'sub' => '서브페이지용'
            ]
        ],

        /* 페이지 설정 */
        // 사용하지 않음. 기본 no-snb.
        //'sidebar' => [
        //    '_type' => 'select',
        //    '_section' => '페이지 설정',
        //    'label' => '사이드바',
        //    'options' => [
        //        '' => '없음',
        //        'no-snb' => '좌측'
        //    ]
        //    /* for body class*/
        //],
        // 사용하지 않음. 기본 no-spot.
        //'banner' => [
        //    '_type' => 'select',
        //    '_section' => '페이지 설정',
        //    'label' => '페이지 타이틀바',
        //    'options' => [
        //        'no-spot' => '출력 안 함',
        //        'txt-banner' => '텍스트만(배경 이미지 출력 안 함)',
        //        '' => '배경 이미지 사용'
        //    ]
        //    /* for body class*/
        //],
        // 사용하지 않음.
        //'bannerImage' => [
        //    '_type' => 'image',
        //    '_section' => '페이지 설정',
        //    'label' => '페이지 타이틀바 배경이미지',
        //],

        /* 메인페이지 설정 */
        'slide1Image' => [
            '_type' => 'image',
            '_section' => '메인페이지 설정',
            'label' => '슬라이드1 이미지',
        ],
        'slide1Title' => [
            '_type' => 'langTextarea',
            '_section' => '메인페이지 설정',
            'label' => '슬라이드1 제목',
        ],
        'slide1Subtitle' => [
            '_type' => 'langTextarea',
            '_section' => '메인페이지 설정',
            'label' => '슬라이드1 내용',
        ],
        'slide2Image' => [
            '_type' => 'image',
            '_section' => '메인페이지 설정',
            'label' => '슬라이드2 이미지',
        ],
        'slide2Title' => [
            '_type' => 'langTextarea',
            '_section' => '메인페이지 설정',
            'label' => '슬라이드2 제목',
        ],
        'slide2Subtitle' => [
            '_type' => 'langTextarea',
            '_section' => '메인페이지 설정',
            'label' => '슬라이드2 내용',
        ],
        'slide3Image' => [
            '_type' => 'image',
            '_section' => '메인페이지 설정',
            'label' => '슬라이드3 이미지',
        ],
        'slide3Title' => [
            '_type' => 'langTextarea',
            '_section' => '메인페이지 설정',
            'label' => '슬라이드3 제목',
        ],
        'slide3Subtitle' => [
            '_type' => 'langTextarea',
            '_section' => '메인페이지 설정',
            'label' => '슬라이드3 내용',
        ],

        /* 헤더 설정 */
        'logoText' => [
            '_type' => 'langText',
            '_section' => '헤더 설정',
            'label' => '로고 제목',
            'placeholder' => '상단에 표시될 로고 대체 텍스트를 입력하세요',
        ],
        'logoImage' => [
            '_type' => 'image',
            '_section' => '헤더 설정',
            'label' => '로고 이미지',
            'description' => '로고 이미지를 등록하세요'
        ],
        'mainMenu' => [
            '_type' => 'menu',
            '_section' => '헤더 설정',
            'label' => '메인 메뉴 선택',
        ],
        'headerPosition' => [
            '_type' => 'select',
            '_section' => '헤더 설정',
            'label' => '헤더 고정',
            'options' => [
                '' => '상단 고정',
                'none-fixed-header' => '고정 안 함',
            ]
            /* for body class*/
        ],
        'headerColorset' => [
            '_type' => 'select',
            '_section' => '헤더 설정',
            'label' => '헤더 컬러셋',
            'options' => [
                '' => 'Transparent',
                'black-header' => 'Black',
                'white-header' => 'White',
            ]
            /* for body class*/
        ],

        /* 푸터 설정 */
        'footerLogoText' => [
            '_type' => 'langText',
            '_section' => '푸터 설정',
            'label' => '푸터 로고 제목',
            'placeholder' => '푸터에 표시될 로고 대체 텍스트를 입력하세요',
        ],
        'footerLogoImage' => [
            '_type' => 'image',
            '_section' => '푸터 설정',
            'label' => '푸터 로고 이미지',
        ],
        'footerContents' => [
            '_type' => 'langTextarea',
            '_section' => '푸터 설정',
            'label' => '푸터 내용 입력',
            'placeholder' => '푸터에 별도로 표시하고 싶은 텍스트를 입력하세요',
        ],
        'useFooterMenu' => [
            '_type' => 'select',
            '_section' => '푸터 설정',
            'label' => '푸터 메뉴 사용 여부',
            'options' => [
                'N' => '사용 안 함',
                'Y' => '사용'
            ]
        ],
        'footerMenu' => [
            '_type' => 'menu',
            '_section' => '푸터 설정',
            'label' => '푸터 메뉴 선택',
        ],
        'copyright' => [
            '_type' => 'textarea',
            '_section' => '푸터 설정',
            'label' => '카피라이트 입력',
            'placeholder' => 'Copyright @2016 Xpessengine. All rights reserved.',
        ],
        'useFooterLinks' => [
            '_type' => 'select',
            '_section' => '푸터 설정',
            'label' => '푸터 링크 사용 여부',
            'options' => [
                'Y' => '사용',
                'N' => '사용 안 함'
            ]
        ],
        'footerLinkIcon[0]' => [
            '_type' => 'text',
            '_section' => '푸터 설정',
            'label' => '푸터 링크1 아이콘',
        ],
        'footerLinkUrl[0]' => [
            '_type' => 'text',
            '_section' => '푸터 설정',
            'label' => '푸터 링크1 주소',
        ],
        'footerLinkIcon[1]' => [
            '_type' => 'text',
            '_section' => '푸터 설정',
            'label' => '푸터 링크2 아이콘',
        ],
        'footerLinkUrl[1]' => [
            '_type' => 'text',
            '_section' => '푸터 설정',
            'label' => '푸터 링크2 주소',
        ],
        'footerLinkIcon[2]' => [
            '_type' => 'text',
            '_section' => '푸터 설정',
            'label' => '푸터 링크3 아이콘',
        ],
        'footerLinkUrl[2]' => [
            '_type' => 'text',
            '_section' => '푸터 설정',
            'label' => '푸터 링크3 주소',
        ],
    ],
    'support' => [
        'mobile' => true,
        'desktop' => true
    ],
    'editable' => [
        'theme.blade.php',
        'main.blade.php',
        'sub.blade.php',
        'gnb.blade.php',
        'fnb.blade.php'
    ]
];
