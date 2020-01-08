<?php
/**
 * Created by PhpStorm.
 * Language: ghost
 * Date: 6/1/19
 * Time: 12:58 AM
 */

namespace App\Http\Services;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageServices
{

    public function fillLanguageFromRequest(Request $request, Language $language = null)
    {
        if (!$language) {
            $language = new Language();
        }
        $language->fill($request->all());
        $language->save();

        return $language;
    }
}
