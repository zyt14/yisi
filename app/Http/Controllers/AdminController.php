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

    public function generateCode($userName){
        $date = date("Ymd");
        $date = hash('snefru', $date);
        $userName=hash('gost',$userName);
        $userNameStart = substr($userName, 0, 16);
        $dateEnd = substr($date, strlen($date) - 16);
        $code = $userNameStart . $dateEnd;
        $code = hash('md5', $code);
        return $code;
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
    public function registered($bossName,Request $request){
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
        $bossCount=$this->Admin->where("name",$bossName)->count();
        if ($bossCount==0){
            return "无法注册,因为经办人不存在";
        }
        $BossUser=$this->Admin->where("name",$bossName)->get();
        $bossCode=$BossUser[0]['code'];
        if (strlen($bossCode)!=32){
            return "经办人错误";
        }
        if ($request['code']!=$bossCode){
            return "注册码错误";
        }
        $name=$request['name'];
        $password=$request['password'];
        $encryptionPassword=$this->passwordEncryption($name,$password);
        $request['password']=$encryptionPassword;
        $token=$this->generateToken($request['password']);
        $code=$this->generateCode($request['name']);
        $request['code']=$code;
        $data = $request->all();
        $data['token']=$token;
        $this->check($data);
        $this->Admin->fill($data);
        $r=$this->Admin->save();
        if ($r){
            if ($bossName!="admin"){
                $this->Admin->where("name",$bossName)->delete();
            }
            $this->success( '管理员添加成功');
        } else {
            $this->error( '管理员添加失败');
        }
    }

    //登录
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

    public function getCode($name){

        $userCount=$this->Admin->where("name",$name)->count();
        if ($userCount==0){
            return "用户不存在";
        }else{
            $User=$this->Admin->where("name",$name)->get();
            $Code=$User[0]['code'];
            return $Code;
        }
    }

    //超级管理员更新密码
    public function adminUpdate(Request $request){
        $name=$request['name'];
        if ($name!='admin'){
            return "无法更新";
        }else{
            $password=$request['password'];
            $encryptionPassword=$this->passwordEncryption($name,$password);
            $newPassword=$request['newPassword'];
            $newEncryptionPassword=$this->passwordEncryption($name,$newPassword);
            $admin=$this->Admin
                ->where("password",$encryptionPassword)
                ->update([
                   'password'=>$newEncryptionPassword
                ]);
            if ($admin) {
                return '更新成功';
            }
            return '更新失败';

        }
    }

    public function getList()
    {
        return $this->baseGetList($this->Admin,"管理员");
    }

    public function del($id)
    {
        $name=$this->baseGetListById($this->Admin,"管理员",$id)['name'];
        if ($name=='admin'){
            return "删除失败";
        }else{
            $this->baseDel($this->Admin,"管理员",$id);
        }
    }


}
