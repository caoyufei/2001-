<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    public  function  login()
    {
        return view("login.login");
    }

    public  function  loginDo(Request $request)
    {
        $u_name=request()->post("u_name");
        $u_pwd=request()->post("u_pwd");
        //dd($u_name,$u_pwd);
        $where=[];
        $res=DB::table('user')->where($where);
        //dd($res);
        if($res){
            echo "登录成功";
        }else{
            echo "登录失败";
        }
    }

    public function new()
    {
        return view("login.new");
    }

    public function add(Request $request)
    {

        $data=request()->post();
        $data=$request->except('_token');
        //dd($data);
        //判断有无文件上传
        if($request->upload('img')){
            $data['img']=$this->upload('img');
        }
    }

    public function upload($filename){
        //判断上传过程有无错误
        if(request()->file($filename)->isValid()){
            //接收值
            $photo=request()->file($filename);
            //上传
            $store_result=$photo->store('uploads');
            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');
    }
}
