<?php

namespace App\Services\CustomPaginationServices;

use File;
use Illuminate\Pagination\Paginator;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Pagination\LengthAwarePaginator;

class PaginationService {
    // large image rendreing
    public function paginate($collection, $perPage) {

        // use custom pagination
        $totalGroup = count($collection);
        $page = Paginator::resolveCurrentPage('page');
        $collection = new LengthAwarePaginator($collection->forPage($page, $perPage), $totalGroup, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);

        return $collection;
    }
}