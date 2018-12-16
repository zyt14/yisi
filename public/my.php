<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/13
 * Time: 22:27
 */

class my
{
    public $categoryList = [
        ['id' => 1, 'name' => '分类1', 'pid' => 0],
        ['id' => 2, 'name' => '分类2', 'pid' => 0],
        ['id' => 3, 'name' => '分类1.1', 'pid' => 1],
        ['id' => 4, 'name' => '分类1.1.1', 'pid' => 3],
        ['id' => 5, 'name' => '分类1.2', 'pid' => 4]
    ];
    public $a=[];

    public function getListId($id){
        foreach ($this->categoryList as $value){
            if ($id==$value['id']){
                if ($value['pid']==0){
                    return $value;
                }else{
                    $this->a=$value;
                    $this->a['parent']=getListId($value['id']);
                    return $this->a;
                }
            }
        }
    }


}
