<?php
include __DIR__ . '/includes/config.php';

// Page data
$pageTitle = $lang->get('nav.left_sidebar') . ' | ' . $SITE_NAME;
$bodyClass = 'left-sidebar is-preload';

// Prepare sidebar data
$sidebarItems = [
    [
        'image' => 'pic09.jpg',
        'title' => 'Sed etiam lorem nulla',
        'description' => 'Lorem ipsum dolor sit amet sit veroeros sed amet blandit consequat veroeros lorem blandit adipiscing et feugiat phasellus tempus dolore ipsum lorem dolore.',
        'button_text' => 'Magna sed taciti'
    ],
    [
        'title' => 'Feugiat consequat',
        'description' => 'Veroeros sed amet blandit consequat veroeros lorem blandit adipiscing et feugiat sed lorem consequat feugiat lorem dolore.',
        'links' => [
            'Sed et blandit consequat sed',
            'Hendrerit tortor vitae sapien dolore',
            'Sapien id suscipit magna sed felis',
            'Aptent taciti sociosqu ad litora'
        ],
        'button_text' => 'Ipsum consequat'
    ]
];

// Prepare main content data
$mainContent = [
    'image' => 'pic01.png',
    'title' => 'Left Sidebar',
    'subtitle' => 'Lorem ipsum dolor sit amet feugiat',
    'paragraphs' => [
        'Vestibulum scelerisque ultricies libero id hendrerit. Vivamus malesuada quam faucibus ante dignissim auctor hendrerit libero placerat. Nulla facilisi. Proin aliquam felis non arcu molestie at accumsan turpis commodo. Proin elementum, nibh non egestas sodales, augue quam aliquet est, id egestas diam justo adipiscing ante. Pellentesque tempus nulla non urna eleifend ut ultrices nisi faucibus.',
        'Praesent a dolor leo. Duis in felis in tortor lobortis volutpat et pretium tellus. Vestibulum ac ante nisl, a elementum odio. Duis semper risus et lectus commodo fringilla. Maecenas sagittis convallis justo vel mattis. placerat, nunc diam iaculis massa, et aliquet nibh leo non nisl vitae porta lobortis, enim neque fringilla nunc, eget faucibus lacus sem quis nunc suspendisse nec lectus sit amet augue rutrum vulputate ut ut mi.'
    ],
    'sections' => [
        [
            'title' => 'Something else',
            'paragraphs' => [
                'Elementum odio duis semper risus et lectus commodo fringilla. Maecenas sagittis convallis justo vel mattis. placerat, nunc diam iaculis massa, et aliquet nibh leo non nisl vitae porta lobortis, enim neque fringilla nunc, eget faucibus lacus sem quis nunc suspendisse nec lectus sit amet augue rutrum vulputate ut ut mi.',
                'Nunc diam iaculis massa, et aliquet nibh leo non nisl vitae porta lobortis, enim neque fringilla nunc, eget faucibus lacus sem quis nunc suspendisse nec lectus sit amet augue rutrum vulputate ut ut mi.'
            ]
        ],
        [
            'title' => 'So in conclusion ...',
            'paragraphs' => [
                'Nunc diam iaculis massa, et aliquet nibh leo non nisl vitae porta lobortis, enim neque fringilla nunc, eget faucibus lacus sem quis nunc suspendisse nec lectus sit amet augue rutrum vulputate ut ut mi. Aenean elementum, mi sit amet porttitor lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ]
        ]
    ]
];

// Render template
echo $twig->render('pages/left-sidebar.html.twig', [
    'page_title' => $pageTitle,
    'body_class' => $bodyClass,
    'sidebar_items' => $sidebarItems,
    'main_content' => $mainContent,
]);