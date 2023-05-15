<?php

declare(strict_types=1);

namespace App\Actions;
use App\Tasks\LoadPageTask;
use App\Tasks\ParseHTMLAttributesTask;

class GetPageAttributesAction
{

    public function run(string $url): array
    {
        $pageContent = (new LoadPageTask)->run($url);

        return  (new ParseHTMLAttributesTask)->run($pageContent);
    }

}
