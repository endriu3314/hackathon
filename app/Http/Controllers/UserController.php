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
     * API for VUE (UserProfile)
     * @param Request $request
     * @return \Illuminate\Http\Response|null
     */
    public function getUser(Request $request)
    {
        $res = null;

        try {
            $res = User::find($request->id)->toJson();
        } catch (Exception $e) {
            $res = ErrorHandler::getErrorResponse('101');
        }

        return $res;
    }

    /**
     * API for Admin Table, all users
     * @return \Illuminate\Http\Response|string|null
     */
    public function getUsers()
    {
        $res = null;

        try {
            $res = User::all()->toJson();
        } catch (Exception $e) {
            $res = ErrorHandler::getErrorResponse('301');
        }

        return $res;
    }

    /**
     * API for user role
     * @param Request $request
     * @return \Illuminate\Http\Response|string|null
     */
    public function getUserRole(Request $request)
    {
        $res = null;

        try {
            $res = User::find($request->id)->hasRole('admin') ? 'true' : 'false';
        } catch (Exception $e) {
            $res = ErrorHandler::getErrorResponse('101');
        }

        return $res;
    }

    /**
     * API USER ROLES
     */
    public function getUsersRoles(Request $request){
        $res = [];

        try{
            $i = 0;
            foreach(User::all() as $user){
                $res[$i] = $user->hasRole('admin');
                $i++;
            }
        } catch (Exception $e) {
            $res = ErrorHandler::getErrorResponse('101');
        }

        return json_encode($res);
    }
    //forms

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response|null
     */
    public function updateUser(Request $request)
    {
        $result = null;
        $request->validate([
            'id' => 'required',
            'name' => 'required|string',
            'email' => 'required|email',
            'varsta' => 'required',
            'nrtel' => 'required',
            'avatar' => 'required',
            'domeniu' => 'string',
            'facultate' => 'string',
            'descriere' => 'string',
        ]);
        try {
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->varsta = $request->varsta;
            $user->nrtel = $request->nrtel;
            $user->avatar = $request->avatar;
            $user->domeniu = $request->domeniu;
            $user->facultate = $request->facultate;
            $user->descriere = $request->descriere;

            $user->save();
            $result = $user;
        } catch (Exception $e) {
            $result = ErrorHandler::getErrorResponse('102');
        }
        return $result;
    }

    //views
    public function showProfile()
    {
        return view('user.profile');
    }
}
