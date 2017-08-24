<?php
return [
    'view' => 'theme',
    'setting' => [
        /* 컬러셋 및 레이아웃 설정 */
        [
            'section' => [
                'class' => 'colorset-section',
                'title' => '컬러셋 및 레이아웃 설정'
            ],
            'fields' => [
                'colorset' => [
                    '_type' => 'select',
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
                    'label' => '컨텐츠 영역 가로폭 고정',
                    'options' => [
                        'xe-container-fluid' => '확장(100%)',
                        'xe-container' => '고정'
                    ]
                ],
                'layout' => [
                    '_type' => 'select',
                    'label' => '레이아웃',
                    'options' => [
                        'main' => '메인페이지용',
                        'sub' => '서브페이지용'
                    ]
                ],
            ]
        ],

        /* 메인페이지 설정 */
        [
            'section' => [
                'class' => 'main-section',
                'title' => '메인페이지 설정'
            ],
            'fields' => [
                'slide1Image' => [
                    '_type' => 'image',
                    'label' => '슬라이드1 이미지',
                ],
                'slide1Title' => [
                    '_type' => 'langTextarea',
                    'label' => '슬라이드1 제목',
                ],
                'slide1Subtitle' => [
                    '_type' => 'langTextarea',
                    'label' => '슬라이드1 내용',
                ],
                'slide2Image' => [
                    '_type' => 'image',
                    'label' => '슬라이드2 이미지',
                ],
                'slide2Title' => [
                    '_type' => 'langTextarea',
                    'label' => '슬라이드2 제목',
                ],
                'slide2Subtitle' => [
                    '_type' => 'langTextarea',
                    'label' => '슬라이드2 내용',
                ],
                'slide3Image' => [
                    '_type' => 'image',
                    'label' => '슬라이드3 이미지',
                ],
                'slide3Title' => [
                    '_type' => 'langTextarea',
                    'label' => '슬라이드3 제목',
                ],
                'slide3Subtitle' => [
                    '_type' => 'langTextarea',
                    'label' => '슬라이드3 내용',
                ],
            ]
        ],

        /* 헤더 설정 */
        [
            'section' => [
                'class' => 'header-section',
                'title' => '헤더 설정'
            ],
            'fields' => [
                'logoText' => [
                    '_type' => 'langText',
                    'label' => '로고 제목',
                    'placeholder' => '상단에 표시될 로고 대체 텍스트를 입력하세요',
                ],
                'logoImage' => [
                    '_type' => 'image',
                    'label' => '로고 이미지',
                    'description' => '로고 이미지를 등록하세요'
                ],
                'mainMenu' => [
                    '_type' => 'menu',
                    'label' => '메인 메뉴 선택',
                ],
                'headerPosition' => [
                    '_type' => 'select',
                    'label' => '헤더 고정',
                    'options' => [
                        '' => '상단 고정',
                        'none-fixed-header' => '고정 안 함',
                    ]
                    /* for body class*/
                ],
                'headerColorset' => [
                    '_type' => 'select',
                    'label' => '헤더 컬러셋',
                    'options' => [
                        '' => 'Transparent',
                        'black-header' => 'Black',
                        'white-header' => 'White',
                    ]
                    /* for body class*/
                ],
            ]
        ],

        /* 푸터 설정 */
        [
            'section' => [
                'class' => 'footer-section',
                'title' => '푸터 설정'
            ],
            'fields' => [
                'footerLogoText' => [
                    '_type' => 'langText',
                    'label' => '푸터 로고 제목',
                    'placeholder' => '푸터에 표시될 로고 대체 텍스트를 입력하세요',
                ],
                'footerLogoImage' => [
                    '_type' => 'image',
                    'label' => '푸터 로고 이미지',
                ],
                'footerContents' => [
                    '_type' => 'langTextarea',
                    'label' => '푸터 내용 입력',
                    'placeholder' => '푸터에 별도로 표시하고 싶은 텍스트를 입력하세요',
                ],
                'useFooterMenu' => [
                    '_type' => 'select',
                    'label' => '푸터 메뉴 사용 여부',
                    'options' => [
                        'N' => '사용 안 함',
                        'Y' => '사용'
                    ]
                ],
                'footerMenu' => [
                    '_type' => 'menu',
                    'label' => '푸터 메뉴 선택',
                ],
                'copyright' => [
                    '_type' => 'textarea',
                    'label' => '카피라이트 입력',
                    'placeholder' => 'Copyright @2016 Xpessengine. All rights reserved.',
                ],
                'useFooterLinks' => [
                    '_type' => 'select',
                    'label' => '푸터 링크 사용 여부',
                    'options' => [
                        'Y' => '사용',
                        'N' => '사용 안 함'
                    ]
                ],
                'footerLinkIcon[0]' => [
                    '_type' => 'text',
                    'label' => '푸터 링크1 아이콘',
                ],
                'footerLinkUrl[0]' => [
                    '_type' => 'text',
                    'label' => '푸터 링크1 주소',
                ],
                'footerLinkIcon[1]' => [
                    '_type' => 'text',
                    'label' => '푸터 링크2 아이콘',
                ],
                'footerLinkUrl[1]' => [
                    '_type' => 'text',
                    'label' => '푸터 링크2 주소',
                ],
                'footerLinkIcon[2]' => [
                    '_type' => 'text',
                    'label' => '푸터 링크3 아이콘',
                ],
                'footerLinkUrl[2]' => [
                    '_type' => 'text',
                    'label' => '푸터 링크3 주소',
                ],
                'useMultiLang' => [
                    '_type' => 'select',
                    'label' => '다국어 선택기',
                    'options' => [
                        'Y' => '사용',
                        'N' => '사용 안 함'
                    ]
                ]
            ]
        ],
    ],
    'support' => [
        'mobile' => true,
        'desktop' => true
    ],
    'editable' => [
        'theme.blade.php',
        'frame.blade.php',
        'main.blade.php',
        'sub.blade.php',
        'gnb.blade.php',
        'fnb.blade.php'
    ]
];
