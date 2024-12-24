<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function handleService(Request $request)
    {
        // Service logic
        $data = [
            'message' => 'Request processed successfully!',
            'request_data' => $request->all(),
        ];

        return response()->json($data, 200);
    }
}
