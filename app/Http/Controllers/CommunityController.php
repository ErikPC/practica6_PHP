<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;

class CommunityController extends Controller
{
    public function index()
    {
        $community = Community::all();
        return response()->json($community, 200);
    }

    public function store(Request $request)
    {
        $community = Community::create($request->all());
        return response()->json($community, 201);
    }

    public function show(Community $community)
    {
        if ($community->exists) {
            return response()->json($community);
        } else {
            return response()->json(['error' => 'Community not found'], 404);
        }
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
