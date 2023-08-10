<?php

namespace App\Http\Controllers\Api\Client;

use App\Actions\Client\ClientIndexAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ClientIndexRequest;
use App\Http\Resources\Client\ClientIndexResource;

class IndexController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(ClientIndexRequest $indexRequest, ClientIndexAction $indexAction)
    {
        return new ClientIndexResource($indexAction->exec($indexRequest));
    }
}
