<?php

namespace App\Http\Controllers\API;

use App\Http\Repository\AreaRepository;
use App\Http\Requests\API\AreaRequest;

class AreaController extends APIController
{
    /**
     * @var AreaRepository
     */
    private $areaRepository;

    /**
     * AreaController constructor.
     * @param AreaRepository $areaRepository
     */
    public function __construct(AreaRepository $areaRepository)
    {
        $this->areaRepository = $areaRepository;
    }

    public function index(AreaRequest $request)
    {
        $areas = $this->areaRepository->search($request)
            ->select('id', 'name')
            ->get();

        return $this->OK($areas);
    }
}
