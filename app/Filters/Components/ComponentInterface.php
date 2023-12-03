<?php

declare(strict_types=1);

namespace App\Filters\Components;

use Closure;

interface ComponentInterface
{
    public function handle(array $content, Closure $next): mixed;
}
