<?php
/**
 * Created by PhpStorm.
 * Setting: ghost
 * Date: 6/1/19
 * Time: 12:58 AM
 */

namespace App\Http\Services;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingServices
{
    /**
     * @var UploaderService
     */
    private $uploaderService;


    /**
     * CategoryServices constructor.
     */
    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }


    public function fillSettingFromRequest(Request $request, Setting $setting = null)
    {
        if (!$setting) {
            $setting = new Setting();
        }
        $data = $request->all();

        if((($request->type_id == 3 || $request->type_id == 4 || $request->type_id == 5) && isset($request->value))){
          $img = $this->uploaderService->upload($request->value, "settings") ;
          $data = $request->except(['value']);
          $data['value'] = $img;
        }
        $setting->fill($data);
        $setting->save();

        return $setting;
    }
}
