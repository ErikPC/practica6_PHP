<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;

class CommunityController extends Controller
{
    public function index()
    {
        // devolver json de comunidades
        return response()->json(Community::all());
    }

    public function store(Request $request)
    {
        $community = new Community;

        $community->title = $request->input('title');
        $community->save();

        return view('communitiesCreate');
    }

    public function show(Community $community)
    {
        return view('communities.show', ['community' => $community]);
    }

    public function edit(Community $community)
    {
        return view('communities.edit', ['community' => $community]);
    }

    public function update(Request $request, Community $community)
    {
        $community->title = $request->input('title');
        $community->save();

        return redirect('/communities');
    }

    public function destroy(Community $community)
    {
        $community->delete();

        return redirect('/communities');
    }
}
