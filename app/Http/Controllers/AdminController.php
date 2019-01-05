<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2019/1/4
 * Time: 13:54
 */

namespace App\Http\Controllers;


use App\Admin;
use Illuminate\Http\Request;

class AdminController extends MyBaseController
{
    public $Admin;

    //码code要生成
    protected $rules = [
        'name' => 'required',
        'password' => 'required',
    ];
    //规则

    protected $messages = [
        'name.required' => '名称必填',
        'password.required' => '密码必填',
    ];
    //违反规则报错

    public function __construct(Admin $admin)
    {
        $this->Admin=$admin;
    }

    //生成token
    public function generateToken($password){
        $date = date("Ymd");
        $date = hash('md5', $date);
        $passwordStart = substr($password, 0, 16);
        $dateEnd = substr($date, strlen($date) - 16);
        $token = $passwordStart . $dateEnd;
        $token = hash('md5', $token);
        return $token;
    }

    //密码加密
    public function passwordEncryption($user,$password){
        $user=hash('snefru',$user);
        $password=hash('gost',$password);
        $passwordStart=substr($password,0,16);
        $nameEnd=substr($user,strlen($user)-16);
        $password=$passwordStart.$nameEnd;
        $password=hash('md5',$password);
        return $password;
    }

    //注册
    public function registered(Request $request){
        if (!isset($request['name'])) {
            return "请填写用户名";
        }
        $usercount=$this->Admin->where("name",$request['name'])->count();
        if ($usercount!=0){
            return "用户已经存在";
        }
        if (!isset($request['password'])) {
            return "请填写密码";
        }
        $name=$request['name'];
        $password=$request['password'];
        $encryptionPassword=$this->passwordEncryption($name,$password);
        $request['password']=$encryptionPassword;

        $token=$this->generateToken($request['password']);

        $data = $request->all();
        $data['token']=$token;
        $this->check($data);
        $this->Admin->fill($data);
        $r=$this->Admin->save();
        if ($r){
            $this->success( '管理员添加成功');
        } else {
            $this->error( '管理员添加失败');
        }
    }

    public function login(Request $request){
        if (!isset($request['name'])) {
            return "请填写用户名";
        }
        $usercount=$this->Admin->where("name",$request['name'])->count();
        if ($usercount==0){
            return "用户不存在";
        }
        if (!isset($request['password'])) {
            return "请填写密码";
        }
        $name=$request['name'];
        $password=$request['password'];
        $encryptionPassword=$this->passwordEncryption($name,$password);
        $request['password']=$encryptionPassword;
        $admin=$this->Admin->where("name",$request['name'])->get();
        if ($admin[0]['password']==$request['password']){
            return "登录成功";
        }else{
            return "登录失败";
        }
    }


}
