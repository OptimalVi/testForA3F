<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Requests\GetPageAttributesRequest;
use Core\System\Facades\Request;

class GetPageAttributesController
{

    /**
     * @param Request $request
     * @return void
     */
    public function calculationPageAttributes(GetPageAttributesRequest $request)
    {
        echo 'Controller method';
    }
}
