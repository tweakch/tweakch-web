<?php
include __DIR__ . '/includes/config.php';

// Page data
$pageTitle = $lang->get('nav.no_sidebar') . ' | ' . $SITE_NAME;
$bodyClass = 'no-sidebar is-preload';

// Prepare main content data
$mainContent = [
    'image' => 'pic01.png',
    'title' => 'No Sidebar',
    'subtitle' => 'Lorem ipsum dolor sit amet feugiat',
    'paragraphs' => [
        'Vestibulum scelerisque ultricies libero id hendrerit. Vivamus malesuada quam faucibus ante dignissim auctor hendrerit libero placerat. Nulla facilisi. Proin aliquam felis non arcu molestie at accumsan turpis commodo. Proin elementum, nibh non egestas sodales, augue quam aliquet est, id egestas diam justo adipiscing ante. Pellentesque tempus nulla non urna eleifend ut ultrices nisi faucibus. Vestibulum scelerisque ultricies libero id hendrerit.',
        'Praesent a dolor leo. Duis in felis in tortor lobortis volutpat et pretium tellus. Vestibulum ac ante nisl, a elementum odio. Duis semper risus et lectus commodo fringilla. Maecenas sagittis convallis justo vel mattis. placerat, nunc diam iaculis massa, et aliquet nibh leo non nisl vitae porta lobortis, enim neque fringilla nunc, eget faucibus lacus sem quis nunc suspendisse nec lectus sit amet augue rutrum vulputate ut ut mi.'
    ],
    'sections' => [
        [
            'title' => 'Something else',
            'paragraphs' => [
                'Elementum odio duis semper risus et lectus commodo fringilla. Maecenas sagittis convallis justo vel mattis. placerat, nunc diam iaculis massa, et aliquet nibh leo non nisl vitae porta lobortis, enim neque fringilla nunc, eget faucibus lacus sem quis nunc suspendisse nec lectus sit amet augue rutrum vulputate ut ut mi. Elementum odio duis semper risus et lectus commodo fringilla.',
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
echo $twig->render('pages/no-sidebar.html.twig', [
    'page_title' => $pageTitle,
    'body_class' => $bodyClass,
    'main_content' => $mainContent,
]);