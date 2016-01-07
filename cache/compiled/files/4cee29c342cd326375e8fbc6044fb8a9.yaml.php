<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => 'C:/wamp/www/system/config/site.yaml',
    'modified' => 1450829883,
    'data' => [
        'title' => 'Grav',
        'author' => [
            'name' => 'John Appleseed',
            'email' => 'john@email.com'
        ],
        'taxonomies' => [
            0 => 'category',
            1 => 'tag'
        ],
        'metadata' => [
            'description' => 'My Grav Site'
        ],
        'summary' => [
            'enabled' => true,
            'format' => 'short',
            'size' => 300,
            'delimiter' => '==='
        ],
        'redirects' => [
            '/redirect-test' => '/',
            '/old/(.*)' => '/new/$1'
        ],
        'routes' => [
            '/something/else' => '/blog/sample-3',
            '/new/(.*)' => '/blog/$1'
        ],
        'blog' => [
            'route' => '/blog'
        ]
    ]
];
