<?php

declare(strict_types=1);

namespace App\Filters\Components;

use Closure;

class Title implements ComponentInterface
{
    public function handle(array $content, Closure $next): mixed
    {
        if (isset($content['params']['title'])) {
            $value = $content['params']['title'];

            $content['builder']->where('title', 'like', '%' . $value . '%');
        }

        return $next($content);
    }
}
