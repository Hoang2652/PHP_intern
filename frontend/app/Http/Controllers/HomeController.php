<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use DB;
use Session;
use App\Models\User;

class HomeController extends Controller
{
    // get view home page
    public function index(){
        $arr = DB::table('joke')->get()->toArray();
        $getJoke = Session::get('Joke');
        if(!isset($getJoke)){
            $randomIndex = rand(0, count($arr) - 1);
            $randomJoke = $arr[$randomIndex];
            array_splice($arr, $randomIndex, 1);
            Session::put('Joke',$arr);
            Session::put('current',$randomJoke->id);
        }
        else if(count($getJoke) == 0){
            $randomJoke = "That's all the jokes for today! Come back another day!";
            Session::put('Joke', null);
        }
        else{
            $randomIndex = rand(0, count($getJoke) - 1);
            $randomJoke = $getJoke[$randomIndex];
            array_splice($getJoke, $randomIndex, 1);
            Session::put('Joke',$getJoke);
            Session::put('current',$randomJoke->id);
        }
        return view('home')->with('joke', $randomJoke);
    }

    // get view login
    public function login(){
        return view('login.login');
    }

    // get view register
    public function register(){
        return view('login.register');
    }

    // check information login 
    public function checkLogin(Request $request){

        $username = $request->username;
        $password = MD5($request->password);

        $result = DB::table('users')
                        ->where('username', '=', $username)
                        ->where('password', '=', $password)
                        ->first();
        if($result){
            toastr()->success("Login success");
            Session::put('username', $result->username);
            Session::put('fullname', $result->fullname);
            return Redirect::to('/');
        }   
        else{
            toastr()->error("Login failed. Please try again.");
            return Redirect::to('/login');
        }
    }

    public function logout(){
        Session::put('username', null);
        Session::put('fullname', null);
        return Redirect::to('/');
    }

    // register account
    public function registerAccount(RegisterRequest $request){
        $data = new user;

        $data->fullname = $request->fullname;
        $data->username = $request->username;
        $data->password = MD5($request->password);
        if($data->save()){
            toastr()->success("Register success.");
            return Redirect::to('/login');
        }
        else{
            toastr()->error("Register failed");
        }
    }

    // get random joke and save vote
    public function getJoke(){
        $getJoke = Session::get('Joke');
        if(count($getJoke) == 0){
            $randomJoke = "That's all the jokes for today! Come back another day!";
        }
        else{
            $randomIndex = rand(0, count($getJoke) - 1);
            $randomJoke = $getJoke[$randomIndex];
            array_splice($getJoke, $randomIndex, 1);
            Session::put('Joke',$getJoke);
            Session::put('current',$randomJoke->id);
        }
        return response()->json($randomJoke);
    }

    public function actionsFunny(){
        $minutes = 60;
        $response = new Response('Set Cookie');
        $vote = Session::get('current');
        $response->withCookie('voteFunny', $vote, $minutes);
        return $this->getJoke();    
    }

    public function actionsNotFunny(){
        $minutes = 60;
        $response = new Response('Set Cookie');
        $vote = Session::get('current');
        $response->withCookie(cookie('voteNotFunny', $vote, $minutes));
        return $this->getJoke();
    }
}
