<?php

namespace App\Actions\Client;

use App\Http\Requests\Client\ClientIndexRequest;
use App\Repositories\ClientRepository;

class ClientIndexAction
{
    protected $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function exec(ClientIndexRequest $request)
    {
        return $this->clientRepository->getAll($request->validated());
    }
}