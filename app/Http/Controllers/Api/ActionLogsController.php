<?php

namespace App\Http\Controllers\Api;

use App\Models\ActionLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActionLogsController extends Controller
{
    //setActionLogs
    public function setActionLogs(Request $request){
        logger($request->all());
       $data=[
        'user_id'=>$request->user_id,
        'post_id'=>$request->post_id
       ];
       ActionLog::create($data);//set action log
       //get action log's post data
       $actionLogData=ActionLog::where('post_id',$request->post_id)->get();

      return response()->json([
        'data'=>$actionLogData
      ]);

    }
}
