<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Project;
Use Log;

class ProjectController extends Controller
{
    // https://carbon.now.sh/
    public function getAll(){

        
      $project = Project::get()->first();


      $pageOffset = (isset($request->pageOffset)) ? (int) $request->pageOffset : 10;
      $sortBy = (isset($request->sortBy));
     
      if ($project)
{
    $data = Project::where('id', $project->id)
    ->paginate($pageOffset);
 
    }
      return response()->json($data, 200);
    }

    public function create(Request $request){
      $data['titre'] = $request['titre'];
      $data['categorie'] = $request['categorie'];
      $data['created_at'] = $request['created_at'];
      Project::create($data);
      return response()->json([
          'message' => "Successfully created",
          'success' => true
      ], 200);
    }

    public function delete($id){
      $res = Project::find($id)->delete();
      return response()->json([
          'message' => "Successfully deleted",
          'success' => true
      ], 200);
    }

    public function get($id){
      $data = Project::find($id);
      return response()->json($data, 200);
    }

    public function update(Request $request,$id){
      $data['titre'] = $request['titre'];
      $data['categorie'] = $request['categorie'];
      $data['created_at'] = $request['created_at'];
      Project::find($id)->update($data);
      return response()->json([
          'message' => "Successfully updated",
          'success' => true
      ], 200);
    }
}
