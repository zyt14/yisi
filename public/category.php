<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/13
 * Time: 19:58
 */
$categoryList = [
    ['id' => 1, 'name' => '分类1', 'pid' => 0],
    ['id' => 2, 'name' => '分类2', 'pid' => 0],
    ['id' => 3, 'name' => '分类1.1', 'pid' => 1],
    ['id' => 4, 'name' => '分类1.1.1', 'pid' => 3],
    ['id' => 5, 'name' => '分类1.2', 'pid' => 4]
];
$a=[];
function getListId($id,$arrend){
    global $categoryList;
    global $a;
    foreach ($categoryList as $value){
        if ($id==$value['id']){
            if ($value['pid']==0){
                return $value;
            }else{
                $a=$value;
                $arrend['parent']=$a['parent'];
                $a=getListId($value['id'],$arrend['parent']);
                return $a;
            }
        }
    }
}


print_r(getListId(1));
