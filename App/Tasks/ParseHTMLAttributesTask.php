<?php

declare(strict_types=1);

namespace App\Tasks;

class ParseHTMLAttributesTask
{

    /**
     * @param string $pageContent
     * @return array
     */
    public function run(string $pageContent): array
    {
        preg_match_all("/< ?(\w+)/", $pageContent, $matching);
        $tags = [];
        if (isset($matching[1]) && is_array($matching[1])) {
            foreach ($matching[1] as $matchedTag) {
                $tag = strtolower($matchedTag);
                isset($tags[$tag])
                    ? $tags[$tag]++
                    : $tags[$tag] = 1;
            }
        }

        return $tags;
    }
}
