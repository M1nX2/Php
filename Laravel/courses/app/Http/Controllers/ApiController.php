<?php

namespace App\Http\Controllers;
use App\Http\Resources\MasterClassResourceCollection;
use App\Http\Resources\MasterClassResource;
use App\Models\Course;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function list()
    {
        $masterClasses = Course::all();
        return response()->json(new MasterClassResourceCollection($masterClasses), 200, [], JSON_UNESCAPED_UNICODE);   
    }
    public function detail($id)
    {
    $masterClass = Course::find($id);
    
    $data = new MasterClassResource($masterClass);
    if($masterClass!=null){
    return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE);
    }
    else
    { 
    return"404";
    }
    }
}
