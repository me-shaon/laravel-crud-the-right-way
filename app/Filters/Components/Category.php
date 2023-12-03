<?php

declare(strict_types=1);

namespace App\Filters\Components;

use Closure;
use App\Constants\Role as RoleConstant;
use Illuminate\Database\Eloquent\Builder;

class Category implements ComponentInterface
{
    public function handle(array $content, Closure $next): mixed
    {
        if (isset($content['params']['category'])) {
            $content['builder']->whereHas('categories', function (Builder $query) use ($content) {
                $query->where('id', $content['params']['category']);
            });
        }

        return $next($content);
    }
}
