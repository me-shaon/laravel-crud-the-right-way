<?php

declare(strict_types=1);

namespace App\Filters\Components;

use Closure;
use App\Constants\Role as RoleConstant;
use Illuminate\Database\Eloquent\Builder;

class Location implements ComponentInterface
{
    public function handle(array $content, Closure $next): mixed
    {
        if (isset($content['params']['location'])) {
            $content['builder']->whereHas('locations', function (Builder $query) use ($content) {
                $query->where('id', $content['params']['location']);
            });
        }

        return $next($content);
    }
}
