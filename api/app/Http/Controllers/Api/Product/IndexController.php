<?php

namespace App\Http\Controllers\Api\Product;

use App\Actions\Product\ProductIndexAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductIndexRequest;
use App\Http\Resources\Product\ProductIndexResource;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductIndexRequest $productIndexRequest, ProductIndexAction $productIndexAction)
    {
        return new ProductIndexResource($productIndexAction->exec($productIndexRequest));
    }
}
