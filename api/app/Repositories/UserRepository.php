<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class UserRepository
{
    /**
     * model instance
     *
     * @var User $model
     */
    protected User $model;

    /**
     * cache module
     *
     * @var const CACHE_MODULE
     */
    const CACHE_MODULE = 'users';

    function __construct(User $model)
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
    public function store(array $validatedUserData): object
    {
        Cache::forget(self::CACHE_MODULE);

        $model = $this->model->create($validatedUserData);

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

    /**
     * get one instance of this object and its relationships
     *
     * @param string $identify
     *
     * @return object $model
     */
    public function getByEmail(string $mail): object | null
    {
        return Cache::rememberForever(self::CACHE_MODULE.$mail, function () use ($mail) {
            return $this->model->where('email', $mail)->first();
        });
    }

}
