<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/24
 * Time: 19:09
 */

namespace App\Http\Controllers;


use App\Production;
use Illuminate\Http\Request;

class ProductionController extends MyBaseController
{
    public $Production;
    public $Request;

    protected $rules = [
        'name' => 'required',

    ];
    //规则
    protected $messages = [
        'name.required' => '职称必填',
    ];

    //违反规则报错

    public function __construct(Production $production, Request $request)
    {
        $this->Production = $production;
        $this->Request = $request;
    }
}
