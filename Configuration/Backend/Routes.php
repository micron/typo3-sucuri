<?php

use Kreativrudel\Sucuri\Controller\CacheController;

return [
    'sucuri_cache_clear' => [
        'path' => '/sucuri/cache/clear',
        'target' => CacheController::class . '::clearAction',
    ],
];
