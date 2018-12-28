<?php
//用户
Route::post('user/add', 'UserController@add');
Route::post('user/del/{id}', 'UserController@del');
Route::post('user/update/{id}', 'UserController@update');
Route::get('user/list/{id}', 'UserController@getListById');
Route::get('user/list', 'UserController@getList');
Route::get('user/list/grade/{grade}', 'UserController@getListByGrade');
Route::get('user/list/position/current', 'UserController@getListByCurrent');//查询现任的
//成员
Route::post('member/add', 'MemberController@add');
Route::post('member/del/{id}', 'MemberController@del');
Route::post('member/update/{id}', 'MemberController@update');
Route::get('member/list/{id}', 'MemberController@getListById');
Route::get('member/list', 'MemberController@getList');
Route::get('member/list/grade/{grade}', 'MemberController@getListByGrade');
//申请人
Route::post('proposer/add', 'ProposerController@add');
Route::post('proposer/del/{id}', 'ProposerController@del');
Route::post('proposer/update/{id}', 'ProposerController@update');
Route::get('proposer/list/{id}', 'ProposerController@getListById');
Route::get('proposer/list', 'ProposerController@getList');
Route::get('proposer/list/grade/{grade}', 'UserController@getListByGrade');
//组别
Route::post('group/add', 'GroupController@add');
Route::post('group/del/{id}', 'GroupController@del');
Route::post('group/update/{id}', 'GroupController@update');
Route::get('group/list/{id}', 'GroupController@getListById');
Route::get('group/list', 'GroupController@getList');
//职位
Route::post('position/add', 'PositionController@add');
Route::post('position/del/{id}', 'PositionController@del');
Route::post('position/update/{id}', 'PositionController@update');
Route::get('position/list/{id}', 'PositionController@getListById');
Route::get('position/list', 'PositionController@getList');
//工作室
Route::post('studio/add', 'StudioController@add');
Route::post('studio/del/{id}', 'StudioController@del');
Route::post('studio/update/{id}', 'StudioController@update');
Route::get('studio/list/{id}', 'StudioController@getListById');
Route::get('studio/list', 'StudioController@getList');
//分类
Route::post('category/add', 'CategoryController@add');
Route::post('category/del/{id}', 'CategoryController@del');
Route::post('category/update/{id}', 'CategoryController@update');
Route::get('category/list/{id}', 'CategoryController@getListById');
Route::get('category/list', 'CategoryController@getList');
//活动
Route::post('activity/add', 'ActivityController@add');
Route::post('activity/del/{id}', 'ActivityController@del');
Route::post('activity/update/{id}', 'ActivityController@update');
Route::get('activity/list/{id}', 'ActivityController@getListById');
Route::get('activity/list', 'ActivityController@getList');
//文章
Route::post('article/add', 'ArticleController@add');
Route::post('article/del/{id}', 'ArticleController@del');
Route::post('article/update/{id}', 'ArticleController@update');
Route::get('article/list/{id}', 'ArticleController@getListById');
Route::get('article/list', 'ArticleController@getList');
Route::get('article/list/catgory/{category_id}', 'ArticleController@getListByCategoryId');
//比赛
Route::post('competition/add', 'CompetitionController@add');
Route::post('competition/del/{id}', 'CompetitionController@del');
Route::post('competition/update/{id}', 'CompetitionController@update');
Route::get('competition/list/{id}', 'CompetitionController@getListById');
Route::get('competition/list', 'CompetitionController@getList');
//组
Route::post('organize/add', 'OrganizeController@add');
Route::post('organize/del/{id}', 'OrganizeController@del');
Route::post('organize/update/{id}', 'OrganizeController@update');
Route::get('organize/list/{id}', 'OrganizeController@getListById');
Route::get('organize/list', 'OrganizeController@getList');
//作品
Route::post('production/add', 'ProductionController@add');
Route::post('production/del/{id}', 'ProductionController@del');
Route::post('production/update/{id}', 'ProductionController@update');
Route::get('production/list/{id}', 'ProductionController@getListById');
Route::get('production/list', 'ProductionController@getList');
