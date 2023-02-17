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
        $community = new Community;
        $community->name = $request->name;
        $community->description = $request->description;
        $community->save();
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
