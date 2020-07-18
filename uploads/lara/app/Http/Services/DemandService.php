<?php


namespace App\Http\Services;



use App\Models\Demand;
use App\Models\DemandDetails;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class DemandService
{
    /**
     * @var UploaderService
     */
    private $uploaderService;

    /**
     * DemandService constructor.
     * @param UploaderService $uploaderService
     */
    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function fill(Request $request, Demand $demand = null)
    {
        if (!$demand) {
            $demand = new Demand();
        }

        $demand->fill($request->request->all());

        $demand->save();

        if ($request->hasFile("image")) {
            $demand->image = $this->updatePhoto($request->file("image"), $demand);
            $demand->save();
        }

        if ($request->hasFile("answer_demand")) {
            $demand->answer_demand = $this->updatePhoto($request->file("answer_demand"), $demand, "answer_demand_images");
            $demand->save();
        }

        if ($request->has('title')) {
            $this->addDemandItem(array_filter($request->input('title')), $demand);
        }

        return $demand->fresh();
    }

    public function updatePhoto(UploadedFile $file, Demand $demand, string $directory = "demands")
    {
         return $this->uploaderService->upload($file, $directory);
    }

    /**
     * @param title[] $images
     * @param Demand $demand
     */
    private function addDemandItem($items, Demand $demand)
    {
        $demandItems = [];

        foreach ($items as $item) {
            $demandItems[] = new DemandDetails(['title' => $item]);
        }

        $demand->items()->saveMany($demandItems);
    }
}
