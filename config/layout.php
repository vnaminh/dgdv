<?php

return [

    // Self
    'self' => [
        'layout' => 'default', // blank, default
        'rtl' => false, // true, false
    ],

    // Base Layout
    'js' => [
        'breakpoints' => [
            'sm' => 576,
            'md' => 768,
            'lg' => 992,
            'xl' => 1200,
            'xxl' => 1200
        ],
        'colors' => [
            'theme' => [
                'base' => [
                    'white' => '#ffffff',
                    'primary' => '#6993FF',
                    'secondary' => '#E5EAEE',
                    'success' => '#1BC5BD',
                    'info' => '#8950FC',
                    'warning' => '#FFA800',
                    'danger' => '#F64E60',
                    'light' => '#F3F6F9',
                    'dark' => '#212121'
                ],
                'light' => [
                    'white' => '#ffffff',
                    'primary' => '#E1E9FF',
                    'secondary' => '#ECF0F3',
                    'success' => '#C9F7F5',
                    'info' => '#EEE5FF',
                    'warning' => '#FFF4DE',
                    'danger' => '#FFE2E5',
                    'light' => '#F3F6F9',
                    'dark' => '#D6D6E0'
                ],
                'inverse' => [
                    'white' => '#ffffff',
                    'primary' => '#ffffff',
                    'secondary' => '#212121',
                    'success' => '#ffffff',
                    'info' => '#ffffff',
                    'warning' => '#ffffff',
                    'danger' => '#ffffff',
                    'light' => '#464E5F',
                    'dark' => '#ffffff'
                ]
            ],
            'gray' => [
                'gray-100' => '#F3F6F9',
                'gray-200' => '#ECF0F3',
                'gray-300' => '#E5EAEE',
                'gray-400' => '#D6D6E0',
                'gray-500' => '#B5B5C3',
                'gray-600' => '#80808F',
                'gray-700' => '#464E5F',
                'gray-800' => '#1B283F',
                'gray-900' => '#212121'
            ]
        ],
        'font-family' => 'Roboto'
    ],

    // Page loader
    'page-loader' => [
        'type' => 'spinner-message' // default, spinner-message, spinner-logo
    ],

    // Header
    'header' => [
        'self' => [
            'display' => true,
            'width' => 'fluid', // fixed, fluid
            'theme' => 'light', // light, dark
            'fixed' => [
                'desktop' => true,
                'mobile' => true
            ]
        ],

        'menu' => [
            'self' => [
                'display' => true,
                'layout'  => 'default', // tab, default
                'root-arrow' => false, // true, false
            ],

            'desktop' => [
                'arrow' => true,
                'toggle' => 'click',
                'submenu' => [
                    'theme' => 'light',
                    'arrow' => true,
                ]
            ],

            'mobile' => [
                'submenu' => [
                    'theme' => 'dark',
                    'accordion' => true
                ],
            ],
        ]
    ],

    // Subheader
    'subheader' => [
        'display' => true,
        'displayDesc' => false,
        'layout' => 'subheader-v1',
        'fixed' => true,
        'width' => 'fluid', // fixed, fluid
        'clear' => false,
        'layouts' => [
            'subheader-v1' => 'Subheader v1',
            'subheader-v2' => 'Subheader v2',
            'subheader-v3' => 'Subheader v3',
            'subheader-v4' => 'Subheader v4',
        ],
        'style' => 'solid' // transparent, solid. can be transparent only if 'fixed' => false
    ],

    // Content
    'content' => [
        'width' => 'fluid', // fluid, fixed
        'extended' => true, // true, false
    ],

    // Brand
    'brand' => [
        'self' => [
            'theme' => 'dark' // light, dark
        ]
    ],

    // Aside
    'aside' => [
        'self' => [
            'theme' => 'dark', // light, dark
            'display' => true,
            'fixed' => true,
            'minimize' => [
                'toggle' => true, // allow toggle
                'default' => true, // default state
                'hoverable' => true //allow hover
            ],
            'active' => true
        ],

        'menu' => [
            'dropdown' => false, // ok
            'scroll' => false, // ok
            'submenu' => [
                'accordion' => true, // true, false
                'dropdown' => [
                    'arrow' => true,
                    'hover-timeout' => 500 // in milliseconds
                    ,
                    'active' => true
                ]
            ]
        ]
    ],

    // Footer
    'footer' => [
        'width' => 'fluid', // fluid, fixed
        'fixed' => true
    ],

    // Extras
    'extras' => [

        // Search
        'search' => [
            'display' => false,
            'layout' => 'dropdown', // offcanvas, dropdown
            'offcanvas' => [
                'direction' => 'right'
            ],
        ],

        // Notifications
        'notifications' => [
            'display' => true,
            'layout' => 'dropdown', // offcanvas, dropdown
            'dropdown' => [
                'style' => 'dark' // light|dark
            ],
            'offcanvas' => [
                'direction' => 'right'
            ]
        ],

        // Quick Actions
        'quick-actions' => [
            'display' => false,
            'layout' => 'dropdown', // offcanvas, dropdown
            'dropdown' => [
                'style' => 'dark' // light|dark
            ],
            'offcanvas' => [
                'direction' => 'right'
            ]
        ],

        // User
        'user' => [
            'display' => true,
            'layout' => 'dropdown', // offcanvas, dropdown
            'dropdown' => [
                'style' => 'dark' // light|dark
            ],
            'offcanvas' => [
                'direction' => 'right'
            ]
        ],

        // Languages
        'languages' => [
            'display' => false
        ],

        // Cart
        'cart' => [
            'display' => false,
            'dropdown' => [
                'style' => 'dark' // light|dark
            ]
        ],

        // Quick Panel
        'quick-panel' => [
            'display' => true,
            'offcanvas' => [
                'direction' => 'right'
            ]
        ],

        // Chat
        'chat' => [
            'display' => false,
        ],

        // Page Toolbar
        'toolbar' => [
            'display' => false
        ],

        // Scrolltop
        'scrolltop' => [
            'display' => true
        ]
    ],

    // Demo Assets
    'resources' => [
        'favicon' => 'media/img/logo/favicon.ico',
        'fonts' => [
            'google' => [
                'families' => [
                    'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap'
                ]
            ]
        ],
        'css' => [
            'plugins/global/plugins.bundle.css',
            'plugins/custom/prismjs/prismjs.bundle.css',
            'css/style.bundle.css',
            'plugins/custom/datatables/datatables.bundle.css',
            'plugins/custom/datatables/fixedHeader.dataTables.css',
            'css/pages/notification/toastr.min.css',
        ],
        'js' => [
            'plugins/global/plugins.bundle.js',
            'plugins/custom/prismjs/prismjs.bundle.js',
            'js/scripts.bundle.js',
            'plugins/custom/datatables/datatables.bundle.js',
            'plugins/custom/datatables/dataTables.fixedHeader.js',
            'js/pages/features/notification/toastr.min.js',
            'js/pages/crud/datatables/extensions/fixedheader.js',
            'js/pages/crud/forms/widgets/bootstrap-multiselect.js',
        ],
    ],

];
