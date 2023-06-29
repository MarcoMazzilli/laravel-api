<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
function index(){

    $projects = Project::paginate(10);

    return response()->json($projects);
}

public function projectDetails($slug){

    $project = Project::where('slug' , $slug)->first();

    if($project->image_path){
        $project->image_path = asset('storage/' . $project->image_path);
    } else{
        $project->image_path = asset('storage/uploads/no-image.jpeg');
        $project->image_original_name = '---no image---';
    }

    return response()->json($project);
}
public function search($toSearch){

    $projects = Project::where('project_name' ,'like', "%$toSearch%")->paginate(10);

    return response()->json($projects);
}
}
