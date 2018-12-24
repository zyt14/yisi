<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/24
 * Time: 19:11
 */

namespace App\Http\Controllers;


use App\Competition;
use Illuminate\Http\Request;

class CompetitionController extends MyBaseController
{
    public $Competition;
    public $Request;

    protected $rules = [
        'time' => 'required',
        'content' => 'required',
    ];
    //规则

    protected $messages = [
        'time.required' => '时间必填',
        'content.required' => '内容必填',
    ];
    //违反规则报错

    public function __construct(Competition $competition, Request $request)
    {
        $this->Competition = $competition;
        $this->Request = $request;
    }
}
