<?php
namespace App\Http\Repository;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingRepository
{
    public function SettingWithFiltration(Request $request)
    {
      $per_page  = 10;
      $settings = Setting::with('type');
      if($request->has('per_page')){
        $per_page = $request->per_page;
      }
      // if($request->has('type_id')){
      //     $settings = $settings->where('type_id',$request->type_id);
      // }
      if($request->has('search') && $request->search != ''){
        $settings = $settings->whereLike(['key','value','type_id','order'],$request->search);
      }
      $settings = $settings->latest('settings.created_at')->Paginate($per_page);
      $settings->appends($request->all());
      return $settings;
    }
}
