<?php

namespace App\Http\Controllers;

use App\Handlers\ErrorHandler;
use App\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    //api
    /**
     * API for VUE (IstoricJoburi)
     * @param Request $request
     * @return \Illuminate\Http\Response|null
     */
    public function getJobs(Request $request)
    {
        $res = null;

        try {
            $res = Job::where('user_id', '=', $request->id)->get()->toJson();
        } catch (Exception $e) {
            $res = ErrorHandler::getErrorResponse('101');
        }

        return $res;
    }

    public function insertJob(Request $request){

    }
}
