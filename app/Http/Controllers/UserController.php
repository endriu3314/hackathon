<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Exception;
use App\Handlers\ErrorHandler;

class UserController extends Controller
{
    //api

    /**
     * API for VUE
     * @param Request $request
     * @return \Illuminate\Http\Response|null
     */
    public function getUser(Request $request){
        $res = null;

        try{
            $res = User::find($request->id)->toJson();
        } catch (Exception $e) {
            $res = ErrorHandler::getErrorResponse('101');
        }

        return $res;
    }

    //views
    public function showProfile() {
        return view('user.profile');
    }
}
