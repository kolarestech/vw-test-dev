<?php

namespace App\Repositories;

use App\Models\Client;
use Illuminate\Support\Facades\Cache;

class ClientRepository
{
    /**
     * model instance
     *
     * @var Client $model
     */
    protected Client $model;

    /**
     * cache module
     *
     * @var const CACHE_MODULE
     */
    const CACHE_MODULE = 'clients';

    function __construct(Client $model)
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
    public function store(array $validatedClientData): object
    {
        Cache::forget(self::CACHE_MODULE);

        $model = $this->model->create($validatedClientData);

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
