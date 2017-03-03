<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RequestController extends Controller{

    public function getBasetest(Request $request){
        $input = $request->input('test');
        echo $input;
    }

    public function getUrl(Request $request){
        if(!$request->is('request/*')){

        }
        $uri = $request->path();
        $url = $request->url();
        echo $uri;
        echo '<br>';
        echo $url;

    }
    public function getMethod(Request $request){
        //非get请求不能访问
        if(!$request->isMethod('get')){
            abort(404);
        }
        $method = $request->method();
        echo $method;
    }

    public function getInputData(Request $request){
        //获取GET方式传递的name参数，默认为LaravelAcademy
        $name = $request->input('name','LaravelAcademy');
        echo $name;
        echo '<br>';
        echo $request->input('test.1.name');
    }

    public function getLastRequest(Request $request){
        $request->flash();
    }

    public function getCurrentRequest(Request $request){
        $lastRequestData = $request->old();
        echo '<pre>';
        print_r($lastRequestData);
    }

    //文件上传表单
    public function getFileupload()
    {
        $postUrl = '/request/fileupload';
        $csrf_field = csrf_field();
        $html = <<<CREATE
<form action="$postUrl" method="POST" enctype="multipart/form-data">
$csrf_field
<input type="file" name="file"><br/><br/>
<input type="submit" value="提交"/>
</form>
CREATE;
        return $html;
    }

//文件上传处理
    public function postFileupload(Request $request){
        //判断请求中是否包含name=file的上传文件
        if(!$request->hasFile('file')){
            exit('上传文件为空！');
        }
        $file = $request->file('file');
        //判断文件上传过程中是否出错
        if(!$file->isValid()){
            exit('文件上传出错！');
        }
        $destPath = realpath(public_path('images'));
        if(!file_exists($destPath))
            mkdir($destPath,0755,true);
        $filename = $file->getClientOriginalName();
        if(!$file->move($destPath,$filename)){
            exit('保存文件失败！');
        }
        exit('文件上传成功！');
//        $newFileName = md5(time().rand(0,10000)).'.'.$file->getClientOriginalExtension();
//        $savePath = 'test/'.$newFileName;
//        $bytes = Storage::put(
//            $savePath,
//            file_get_contents($file->getRealPath())
//        );
//        if(!Storage::exists($savePath)){
//            exit('保存文件失败！');
//        }
//        header("Content-Type: ".Storage::mimeType($savePath));
//        echo Storage::get($savePath);
    }
}