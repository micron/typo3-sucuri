<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Sucuri',
    'description' => 'Enables to clear the cache on Sucuri Firewall enabled websites.',
    'category' => 'module',
    'author' => 'Miron Ogrodowicz',
    'author_email' => 'miron.ogrodowicz@kreativrudel.de',
    'state' => 'alpha',
    'version' => '2.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
