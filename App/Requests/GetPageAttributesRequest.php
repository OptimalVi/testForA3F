<?php

declare(strict_types=1);

namespace App\Requests;

use Core\Fund\Request;
use Core\System\Facades\RequestInterface;

class GetPageAttributesRequest extends Request
{

    /**
     * @param RequestInterface $request
     * @return array<string,string>
     */
    public function validation(RequestInterface $request): array
    {
        echo 'validation';
        $errors = [];
        if (!$request->has('url')) {
            $errors['url'] = 'url is required';
        }
        return $errors;
    }
}
