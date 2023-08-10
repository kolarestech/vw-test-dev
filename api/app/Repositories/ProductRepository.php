<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductRepository
{
    /**
     * model instance
     *
     * @var Product $model
     */
    protected Product $model;

    /**
     * cache module
     *
     * @var const CACHE_MODULE
     */
    const CACHE_MODULE = 'products';

    function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * insert new instance os this object on database
     *
     * @param array $data
     *
     * @return object $model
     */
    public function getAll(array $validatedProductData): object
    {
        Cache::forget(self::CACHE_MODULE);

        $model = $this->model->all();

        return $model;
    }

    /**
     * insert new instance os this object on database
     *
     * @param array $data
     *
     * @return object $model
     */
    public function store(array $validatedProductData): object
    {
        Cache::forget(self::CACHE_MODULE);

        $model = $this->model->create($validatedProductData);

        return $model;
    }

    /**
     * get one instance of this object and its relationships
     *
     * @param string $identify
     *
     * @return object $model
     */
    public function getByIdentify(string $identify): object
    {
        return Cache::rememberForever(self::CACHE_MODULE.$identify, function () use ($identify) {
            return $this->model->where('uuid', $identify)->firstOrFail();
        });
    }
}
