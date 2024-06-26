<?php

namespace App\Http\Controllers;

use App\Models\projects;
use App\Http\Requests\StoreprojectsRequest;
use App\Http\Requests\UpdateprojectsRequest;
use Illuminate\Http\Request;
use App\Models\project_files;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = projects::all();
        return view('projects')->with(['projects'=>$projects]);
    }


    public function landing()
    {
        $project_files = project_files::where('featured','Yes')->get();
        return view('landing.index')->with(['projects'=>$project_files]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cid)
    {
        return view('new-project')->with(['client_id'=>$cid]);

    }

    public function newProject()
    {
        return view('new-project');

    }

    public function clientProjects($cid)
    {
        $clientprojects = projects::where('client_id',$cid)->get();
        return view('projects')->with(['projects'=>$clientprojects]);

    }

    public function projectDashboard($pid)
    {
        $project = projects::where('id',$pid)->first();
        return view('project-dashboard')->with(['project'=>$project]);

    }

    public function editProject($pid)
    {
        $project = projects::where('id',$pid)->first();
        return view('new-project')->with(['project'=>$project]);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreprojectsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->project_id!=''){
            $outcome = "modified";
        }else{
            $outcome = "created";
        }


        projects::updateOrCreate(['id'=>$request->project_id],[
            'client_id'=>$request->client_id,
            'title'=>$request->title,
            'location'=>$request->location,
            'start_date'=>$request->start_date,
            'estimated_duration'=>$request->estimated_duration,
            'duration'=>$request->duration,
            'details'=>$request->details,
            'project_manager'=>$request->project_manager,
            'status'=>$request->status,
            'business_id'=>Auth()->user()->business_id
        ]);

        $message = 'The project has been '.$outcome.' successfully';

        return redirect()->route('projects')->with(['message'=>$message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(projects $projects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(projects $projects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprojectsRequest  $request
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateprojectsRequest $request, projects $projects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(projects $projects)
    {
        //
    }
}
