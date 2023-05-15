<?php

declare(strict_types=1);

namespace Core\Fund;

enum HTTPMethods: string
{
    case GET = 'GET';
    case POST = 'POST';
    case DELETE = 'DELETE';
    case UPDATE = 'UPDATE';
    
}
