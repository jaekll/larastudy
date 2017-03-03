<?php

namespace App\Http\Controllers;

use App\Contracts\TestContract;
use Illuminate\Http\Request;

use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Facades\TestClass;
use Illuminate\Support\Facades\DB;
use  App\Models\Post;
use  App\Models\User;

class TestController extends Controller
{
    public function __construct(TestContract $test)
    {
        $this->test = $test;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->test->callMe('provider');
//        $test = App::make('test');
//        $test->callMe('testController');
        //TestClass::doSomething();
//        DB::insert('insert into users (id, name, email, password) values (?, ?, ? , ? )',
//            [3, 'LaravelAcademy','laravel-academy@test.com','123']);
        //$post = Post::all();
       // $post = Post::where('id','<',3)->orderBy('id','desc')->take(1)->get();
//        Post::chunk(2,function($posts){
//            foreach($posts as $post){
//                echo $post->title.'<br>';
//            }
//        });
//        $count = Post::where('id','>',0)->count();
//        echo $count;
           // $account = App\Models\User::find(1)->account;
         $user = User::find(1);
        $roles = $user->roles;
        echo 'user#' . $user->name . '所扮演的角色<br>';
        foreach($roles as $role){
            echo $role->name . '<br>';
        }

//        $post->title = '我是一个粉刷匠';
//        if($post->save()){
//            echo 'OK';
//        }else{
//            echo 'err';
//        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
