<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class TagController extends Controller
{

    public function getTags(Request $request)
    {
        $res = Tag::select('name')
            ->where('name', 'LIKE', "%{$request->tags}")
        ->get();
        return response()->json($res);
    }
}
