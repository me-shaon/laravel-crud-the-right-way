<?php

use Illuminate\Support\Collection;

if (! function_exists('getTitles')) {
    function getTitles(Collection $collection): string
    {
        return implode(', ', $collection->pluck('title')->toArray());
    }
}
