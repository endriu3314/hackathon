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
        $res = null;

        $request->validate([
            'functie' => 'required',
            'companie' => 'required',
            'data1' => 'required',
            'data2' => 'required',
        ]);

        try {
            $job = new Job;
            $job->user_id = $request->id;
            $job->functie = $request->functie;
            $job->companie = $request->companie;
            $job->start_job = $request->data1;
            $job->end_job = $request->data2;

            $job->save();
            $res = $job;
        } catch (Exception $e){
            $res = ErrorHandler::getErrorResponse('102');
        }

        return $res;
    }

    public function updateJob(Request $request){
        $result = null;

        $request->validate([
            'functie' => 'required',
            'companie' => 'required',
            'data1' => 'required',
            'data2' => 'required',
        ]);

        try {
            $job = Job::find($request->id);
            $job->user_id = $request->id;
            $job->functie = $request->functie;
            $job->companie = $request->companie;
            $job->start_job = $request->data1;
            $job->end_job = $request->data2;

            $job->save();
            $result = $user;
        } catch (Exception $e) {
            $result = ErrorHandler::getErrorResponse('102');
        }

        return $result;
    }
}
