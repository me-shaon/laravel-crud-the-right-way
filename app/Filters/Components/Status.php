<?php

declare(strict_types=1);

namespace App\Filters\Components;

use Closure;

class Status implements ComponentInterface
{
    public function handle(array $content, Closure $next): mixed
    {
        if (isset($content['params']['status'])) {
            $content['builder']->where('status', $content['params']['status']);
        }

        return $next($content);
    }
}
