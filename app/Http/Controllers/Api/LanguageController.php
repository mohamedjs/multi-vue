<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Language;
use App\Http\Requests\Api\LanguageRequest;
use App\Http\Repository\LanguageRepository;
use App\Http\Services\LanguageServices;

class LanguageController extends Controller
{
  /**
   * @var languageServices
   */
  private $languageServices;
  /**
   * @var languageRepository
   */
  private $languageRepository;

  public function __construct(LanguageRepository $languageRepository ,LanguageServices $languageServices)
  {
      $this->languageRepository = $languageRepository  ;
      $this->languageServices   = $languageServices    ;
  }

  public function index(Request $request)
  {
    $languages = $this->languageRepository->LanguageWithFiltration(request());
    $data['languages'] = $languages;
    return response()->json(['status' => 'success' , 'data' => $data , 'message' => 'Get All Language']);
  }

  public function store(LanguageRequest $request)
  {
    $language = $this->languageServices->fillLanguageFromRequest($request);
    return response()->json(['data' => $language , 'status' => 'success' , 'message' => 'Language Added Successfully']);
  }

  public function edit($id)
  {
    $language = Language::find($id);
    return response()->json(['status' => 'success' , 'data' => $language , 'message' => 'Get Language For Edit Success']);
  }

  public function update(LanguageRequest $request,Language $language)
  {
    $language = $this->languageServices->fillLanguageFromRequest($request,$language);
    return response()->json(['status' => 'success' , 'data' => $language , 'message' => 'Update Language SuccessFully']);
  }

  public function destroy($id)
  {
    $language = Language::find($id)->delete();
    return response()->json(['status' => 'success' , 'data' => (object)[] , 'message' => 'Delete Language SuccessFully']);
  }
}
