<?php

namespace App\Repositories;

use App\Models\Opportunity;
use Illuminate\Support\Facades\Cache;

class OpportunityRepository
{
    /**
     * model instance
     *
     * @var Opportunity $model
     */
    protected Opportunity $model;

    /**
     * cache module
     *
     * @var const CACHE_MODULE
     */
    const CACHE_MODULE = 'opportunities';

    function __construct(Opportunity $model)
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
    public function getAll(array $validatedClientData): object
    {
        Cache::forget(self::CACHE_MODULE);

        $model = $this->model->with("client", "seller", "products")->get();

        return $model;
    }

    /**
     * insert new instance os this object on database
     *
     * @param array $data
     *
     * @return object $model
     */
    public function store(array $validatedOpportunityData): object
    {
        Cache::forget(self::CACHE_MODULE);

        $model = $this->model->create($validatedOpportunityData);

        return $model;
    }

    /**
     * insert new instance os this object on database
     *
     * @param array $data
     *
     * @return object $model
     */
    public function update(string $identify, array $validatedOpportunityData): object
    {
        Cache::forget(self::CACHE_MODULE);

        $model = $this->getByIdentify($identify);

        $model->update($validatedOpportunityData);

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
