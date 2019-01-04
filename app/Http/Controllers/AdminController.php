<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2019/1/4
 * Time: 13:54
 */

namespace App\Http\Controllers;


use App\Admin;

class AdminController extends MyBaseController
{
    public $Admin;

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
    public function generateToken($user,$password){

    }


}
