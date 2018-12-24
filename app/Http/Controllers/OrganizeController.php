<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/24
 * Time: 19:10
 */

namespace App\Http\Controllers;


use App\Organize;
use Illuminate\Http\Request;

class OrganizeController extends MyBaseController
{
    public $Organize;
    public $Request;

    protected $rules = [
        'group_id' => 'required',
        'introduce' => 'required',
    ];
    //规则
    protected $messages = [
        'category_id.required' => '组别id必填',
        'introduce.required' => '介绍必填',
    ];

    //违反规则报错

    public function __construct(Organize $organize, Request $request)
    {
        $this->Organize = $organize;
        $this->Request = $request;
    }
}
