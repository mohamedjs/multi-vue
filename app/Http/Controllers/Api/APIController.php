<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;

class APIController extends Controller
{
    public function OK($data= [], $message = "")
    {
        return response()->json(['data' => $data, 'message' => $message, 'status' => true], 200);
    }

    public function delete($data= [], $message = "")
    {
        return response()->json(['data' => $data, 'message' => $message, 'status' => true]);
    }

    public function error($message, $result = [])
    {
        return response()->json(['data' => $result, 'message' => $message, 'status' => false], 417);
    }
}
