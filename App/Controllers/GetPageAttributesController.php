<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Actions\GetPageAttributesAction;
use App\Requests\GetPageAttributesRequest;
use Core\Fund\Response;
use Core\System\Facades\Request;

class GetPageAttributesController
{

    /**
     * @param Request $request
     * @return void
     */
    public function calculationPageAttributes(GetPageAttributesRequest $request): mixed
    {
        $result = (new GetPageAttributesAction)
            ->run($request->get('url'));

        return Response::json($result);
    }
}
