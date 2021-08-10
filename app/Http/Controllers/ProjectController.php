<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projects.index', ['projects' => Project::orderBy('name')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create', ['projects' => Project::orderBy('name')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:projects,name|max:30']);
        $project = new Project();
        $project->fill($request->all());
        $project->save();

        return ($project->save() !==1) ?
            redirect('/project')->with('status_success', 'Project created!') : 
            redirect('/project')->with('status_error', 'Project was not created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project){
        
        return view('projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        
        $this->validate($request, [
            "name" => 'required|unique:projects,name,'.$project->id
        ]);

        $project->fill($request->all());
        return ($project->save() !==1) ?
            redirect('/project')->with('status_success', 'Project updated!') : 
            redirect('/project')->with('status_error', 'Project was not updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        return ($project->delete() !==1) ?
            redirect('/project')->with('status_success', 'Project deleted!') : 
            redirect('/project')->with('status_error', 'Project was not deleted!');
    }
}