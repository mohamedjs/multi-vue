<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;

class APIController extends Controller
{
    public function OK($data= [], $message = "")
    {
        return response()->json(['result' => $data, 'message' => $message, 'status' => true], 200);
    }

    public function delete($data= [], $message = "")
    {
        return response()->json(['result' => $data, 'message' => $message, 'status' => true]);
    }

    public function error($message, $result = [])
    {
        return response()->json(['result' => $result, 'message' => $message, 'status' => false], 417);
    }
}
