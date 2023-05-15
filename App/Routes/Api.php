<?php

declare(strict_types=1);

use Core\System\Facades\Router;
use App\Controllers\GetPageAttributesController;
use Core\Fund\Response;
use Core\Fund\Route;

Router::post(
    '/',
    [GetPageAttributesController::class, 'calculationPageAttributes']
);
