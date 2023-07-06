<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Sucuri',
    'description' => 'Enables to clear the cache on Sucuri Firewall enabled websites.',
    'category' => 'module',
    'author' => 'Miron Ogrodowicz',
    'author_email' => 'miron.ogrodowicz@kreativrudel.de',
    'state' => 'alpha',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
