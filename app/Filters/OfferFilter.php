<?php

namespace App\Filters;

use App\Filters\Components\Category;
use App\Filters\Components\Location;
use App\Filters\Components\Status;
use App\Filters\Components\Title;

class OfferFilter extends BaseFilter
{
    protected function getFilters(): array
    {
        return [
            Status::class,
            Title::class,
            Category::class,
            Location::class
        ];
    }
}
