<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use App\Api\V1\Requests\PostRequest;
use JWTAuth;
use App\Post;

class PostController extends Controller
{
    /**
     * @SWG\Post(
     *     path="/api/post",
     *     summary="Add a new post.",
     *     tags={"post"},
     *     description="A user can add a new post.",
     *     operationId="signup",
     *     @SWG\Parameter(
     *         name="title",
     *         in="query",
     *         description="title",
     *         type="string",
     *     ),
     *     @SWG\Parameter(
     *         name="content",
     *         in="query",
     *         description="content",
     *         type="string",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="this is a sample description"
     *     )
     * )
     */
    public function store(PostRequest $request)
    {
        $token = JWTAuth::getToken();
        $user = JWTAuth::toUser($token);

        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $user->id
        ]);
        $post->save();

        return response()->json([
            'status' => 'ok'
        ]);
    }
}
