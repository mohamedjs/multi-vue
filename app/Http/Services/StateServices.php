<?php
/**
 * Created by PhpStorm.
 * State: ghost
 * Date: 6/1/19
 * Time: 12:58 AM
 */

namespace App\Http\Services;

use App\State;
use Illuminate\Http\Request;

class StateServices
{

    public function fillStateFromRequest(Request $request, State $state = null)
    {
        if (!$state) {
            $state = new State();
        }

        $state->fill($request->all());
        $state->save();

        return $state;
    }
}
