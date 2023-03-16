<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::where('status', 1)->with('technologies', 'type')->orderBy('updated_at', 'DESC')->get();
        foreach ($projects as $project) {
            if ($project->image) $project->image = url('storage/' . $project->image);
        }
        return  response()->json($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $project = Project::find($id)->with('technologies', 'type')->get();
        if (!$project) return response('null', 404);
        return response()->json($project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
