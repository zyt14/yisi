<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/12
 * Time: 10:30
 */

namespace App\Http\Controllers;


class MyTestController
{

//    public function add(){
//        $this->baseAddImg($this->User,'用户','avatar',$this->Request );
//    }

    //获取用户token
    public function getUserToken($phone, $password)
    {
        $date = date("Ymd");
        $date = hash('md5', $date);//日期md5加密
        $password = $this->passwordEncryption($password, $phone);//密码加密
        $passwordStart = substr($password, 0, 16);//获取密码加密的前16位
        $dateEnd = substr($date, strlen($phone) - 16);//获取日期加密的后16位
        $token = $passwordStart . $dateEnd;//获取的位数进行合并
        $token = hash('md5', $token);//将合并的数据进行md5加密
        return $token;
    }

    //获取数据库用户token
    public function getUserDbToken($phone, $password)
    {
        $date = date("Ymd");
        $date = hash('md5', $date);//日期md5加密
        $passwordStart = substr($password, 0, 16);//获取密码加密的前16位
        $dateEnd = substr($date, strlen($phone) - 16);//获取日期加密的后16位
        $token = $passwordStart . $dateEnd;//获取的位数进行合并
        $token = hash('md5', $token);//将合并的数据进行md5加密
        return $token;
    }

    public function login(Request $request)
    {
        $phone = $request['phone'];
        $passwod = $request['password'];
        $userLoginToken = $this->getUserToken($phone, $passwod);
        //根据用户输入内容获取token

        DB::table('user')
            ->where('phone', $phone)
            ->update(
                [
                    'token' => $userLoginToken,
                ]
            );
        //根据用户的token更新sql
        $userCount = DB::table('user')
            ->where('phone', $phone)
            ->count();
        if (!$userCount) {
            return "手机号错误";
        }

        $user = DB::table('user')
            ->where('phone', $phone)
            ->get();
        $dbPhone = json_decode($user, true)['0']['phone'];
        $dbPassword = json_decode($user, true)['0']['password'];
        $dbId = json_decode($user, true)['0']['id'];
        $userDbToken = $this->getUserDbToken($dbPhone, $dbPassword);
        $allToken = ['dbId' => $dbId, 'userToken' => $userLoginToken, 'dbUserToken' => $userDbToken];

        return $allToken;
        //用户登录完成差userToken和dbUserToken中间件处理？？？
        //用户的头像如果是绝对路径处理？？？？
    }

    public function layout($phone)
    {
        $r = DB::table('user')
            ->where('phone', $phone)
            ->update(
                [
                    'token' => "",
                ]
            );
        if ($r) {
            $this->success("退出登录成功");
        } else {
            $this->error("退出登录失败");
        }
    }

    public function passwordEncryption($password, $phone)
    {
        $password = hash('gost', $password);//密码进行gost加密
        $phone = hash('snefru', $phone);//手机号进行snefru加密
        $passwordStart = substr($password, 0, 16);//获取密码加密的前16位
        $phoneEnd = substr($phone, strlen($phone) - 16);//获取手机号加密的后16位
        $password = $passwordStart . $phoneEnd;//获取的位数进行合并
        $password = hash('md5', $password);//将合并的数据进行md5加密
        return $password;
    }

    public function add(Request $request)
    {

        $data = $request->all();

        //手机号处理
        if (!isset($data['phone'])) {
            return "请填写手机号";
        } else {
            $phoneNumber = $this->User
                ->where("phone", "=", $data['phone'])
                ->count();
            if ($phoneNumber != 0) {
                return "你的手机号被注册过了";
            }
        }

        //性别处理
        if (isset($data['gender'])) {
            if ($data['gender'] == 'M' || $data['gender'] == 'F') {

            } else {
                $data['gender'] = "U";
            }
        }

        //密码处理
        if (!isset($data['password'])) {
            return "请填写密码";
        } else {
            $phone = $data['phone'];
            $password = $data['password'];
            $data['password'] = $this->passwordEncryption($password, $phone);
//            //密码加密
//            $phone=$data['phone'];//获取手机号
//            $data['password']=hash('gost',$data['password']);//密码进行gost加密
//            $phone=hash('snefru',$phone);//手机号进行snefru加密
//            $passwordStart=substr($data['password'],0,16);//获取密码加密的前16位
//            $phoneEnd=substr($phone,strlen($phone)-16);//获取手机号加密的后16位
//            $password=$passwordStart.$phoneEnd;//获取的位数进行合并
//            $data['password']=hash('md5',$password);//将合并的数据进行md5加密
        }

        //头像处理
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $this->getUpLoadImg('avatar');
        } else {
            //这里设置默认头像
            $data['avatar'] = "/default/img/User.jpeg";
        }

        $this->check($data);
        $this->User->fill($data);
        $r = $this->User->save();
        if ($r) {
            $this->success('用户添加成功');
        } else {
            $this->error('用户添加失败');
        }
    }


}
