<?php

namespace App\Http\Controllers\API;

use App\Http\Repository\ProviderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProviderController extends APIController
{
    /**
     * @var ProviderRepository
     */
    private $providerRepository;

    /**
     * ProviderController constructor.
     * @param ProviderRepository $providerRepository
     */
    public function __construct(ProviderRepository $providerRepository)
    {
        $this->providerRepository = $providerRepository;
    }

    public function index(Request $request)
    {
        $providers = $this->providerRepository->search($request)
            ->select("id", "name", "address", "image")
            ->get();

        return $this->OK($providers, "all Providers");
    }
}
