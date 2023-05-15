<?php

declare(strict_types=1);

namespace Core\Fund;

class Response
{
    /**
     * Respose as json
     *
     * @param array $body
     * @param string $status
     * @param integer $code
     * @return mixed
     */
    public static function json(mixed $body = '', $status = 'Ok', $code = 200): string|bool|null
    {
        http_response_code($code);
        header('Content-Type: application/json');
        $protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');
        header($protocol . ' ' . $code . ' ' . $status);

        if (!empty($body)) {
            return json_encode($body);
        }
        return null;
    }
}
