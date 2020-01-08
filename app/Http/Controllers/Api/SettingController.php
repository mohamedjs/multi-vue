<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Models\Setting;
use App\Http\Requests\Api\SettingRequest;
use App\Http\Repository\SettingRepository;
use App\Http\Services\SettingServices;

class SettingController extends Controller
{
  /**
   * @var settingServices
   */
  private $settingServices;
  /**
   * @var settingRepository
   */
  private $settingRepository;

  public function __construct(SettingRepository $settingRepository ,SettingServices $settingServices)
  {
      $this->settingRepository = $settingRepository  ;
      $this->settingServices   = $settingServices    ;
  }

  public function index(Request $request)
  {
    $settings = $this->settingRepository->SettingWithFiltration(request());
    $data['settings'] = $settings;
    return response()->json(['status' => 'success' , 'data' => $data , 'message' => 'Get All Setting']);
  }

  public function store(SettingRequest $request)
  {
    $setting = $this->settingServices->fillSettingFromRequest($request);
    return response()->json(['data' => $setting , 'status' => 'success' , 'message' => 'Setting Added Successfully']);
  }

  public function edit($id)
  {
    $setting = Setting::with('type')->where('settings.id',$id)->first();
    return response()->json(['status' => 'success' , 'data' => $setting , 'message' => 'Get Setting For Edit Success']);
  }

  public function update(SettingRequest $request,Setting $setting)
  {
    $setting = $this->settingServices->fillSettingFromRequest($request,$setting);
    return response()->json(['status' => 'success' , 'data' => $setting , 'message' => 'Update Setting SuccessFully']);
  }

  public function destroy($id)
  {
    $setting = Setting::find($id)->delete();
    return response()->json(['status' => 'success' , 'data' => (object)[] , 'message' => 'Delete Setting SuccessFully']);
  }
}
