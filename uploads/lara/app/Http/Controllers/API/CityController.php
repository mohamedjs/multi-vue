<?php

namespace App\Http\Controllers\API;

use App\Constants\Status;
use App\Http\Repository\CityRepository;
use Illuminate\Http\Request;

class CityController extends APIController
{
    /**
     * @var CityRepository
     */
    private $cityRepository;

    /**
     * CityController constructor.
     * @param CityRepository $cityRepository
     */
    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function index(Request $request)
    {
        $cities = $this->cityRepository->search($request)
            ->where("active", "=", Status::ACTIVE)
            ->select('id','name')
            ->get();

        return $this->OK($cities);
    }
}
