<?php

namespace App\Actions\Product;

use App\Http\Requests\Product\ProductIndexRequest;
use App\Repositories\ProductRepository;

class ProductIndexAction
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function exec(ProductIndexRequest $request)
    {
        return $this->productRepository->getAll($request->validated());
    }
}
