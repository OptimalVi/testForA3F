<?php

declare(strict_types=1);

use Core\System\Facades\Router;
use App\Controllers\GetPageAttributesController;

Router::post(
    '/api/get-attributes',
    [GetPageAttributesController::class, 'calculationPageAttributes']
);
