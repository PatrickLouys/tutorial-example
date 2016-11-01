<?php declare(strict_types = 1);

return [
    ['GET', '/', ['Example\Controllers\Homepage', 'show']],
    ['GET', '/{slug}', ['Example\Controllers\Page', 'show']],
];