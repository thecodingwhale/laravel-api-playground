<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;

class HelloController extends Controller
{
    /**
     * @SWG\Get(
     *     path="/api/hello",
     *     tags={"hello"},
     *     @SWG\Response(
     *         response=200,
     *         description="successful operation"
     *     )
     * )
     */
    public function hello()
    {
        return response()->json([
            'message' => 'Hello World'
        ]);
    }
}
