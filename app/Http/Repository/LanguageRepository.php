<?php
namespace App\Http\Repository;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageRepository
{
    public function LanguageWithFiltration(Request $request)
    {
      $per_page  = 10;
      if($request->has('per_page')){
        $per_page = $request->per_page;
      }
      $languages = Language::latest('created_at');
      if($request->has('search') && $request->search != ''){
        $languages = $languages->whereLike(['title','short_code'],$request->search);
      }
      $languages = $languages->Paginate($per_page);
      $languages->appends($request->all());
      return $languages;
    }
}
