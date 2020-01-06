<?php
/**
 * Created by PhpStorm.
 * Advertisment: ghost
 * Date: 6/1/19
 * Time: 12:58 AM
 */

namespace App\Http\Services;

use App\Advertisement;
use Illuminate\Http\Request;

class AdvertismentServices
{
    /**
     * @var UploaderService
     */
    private $uploaderService;


    /**
     * AdvertismentServices constructor.
     */
    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function fillAdvertismentFromRequest(Request $request, Advertisement $advertisment = null)
    {
        if (!$advertisment) {
            $advertisment = new Advertisement();
        }
        $data = $request->all();
        if($request->has('image')){
          $img = $this->uploaderService->upload($request->image, "advers") ;
          $data = $request->except(['image']);
          $data['image'] = $img;
        }
        $advertisment->fill($data);
        $advertisment->save();

        return $advertisment;
    }
}
