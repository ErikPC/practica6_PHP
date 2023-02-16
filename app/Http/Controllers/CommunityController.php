<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;

class CommunityController extends Controller
{
    public function index()
    {
        $post = Community::all();
        return response()->json($post);
    }

    public function store(Request $request)
    {
        $community = Community::create($request->all());
        return response()->json($community, 201);
    }

    public function show(Community $community)
    {
        return response()->json($community);
    }

    public function update(Request $request, Community $community)
    {
        $community->update($request->all());
        return response()->json($community);
    }

    public function destroy(Community $community)
    {
        $community->delete();

        return response()->json(null, 204);
    }
}
