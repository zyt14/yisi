<?php
Route::post('user/add', 'UserController@add');
Route::post('user/del/{id}', 'UserController@del');
Route::post('user/update/{id}', 'UserController@update');
Route::get('user/list/{id}', 'UserController@getListById');
Route::get('user/list', 'UserController@getList');
Route::get('user/list/grade/{grade}', 'UserController@getListByGrade');

Route::post('member/add', 'MemberController@add');
Route::post('member/del/{id}', 'MemberController@del');
Route::post('member/update/{id}', 'MemberController@update');
Route::get('member/list/{id}', 'MemberController@getListById');
Route::get('member/list', 'MemberController@getList');
Route::get('member/list/grade/{grade}', 'UserController@getListByGrade');

Route::post('proposer/add', 'ProposerController@add');
Route::post('proposer/del/{id}', 'ProposerController@del');
Route::post('proposer/update/{id}', 'ProposerController@update');
Route::get('proposer/list/{id}', 'ProposerController@getListById');
Route::get('proposer/list', 'ProposerController@getList');
Route::get('proposer/list/grade/{grade}', 'UserController@getListByGrade');

Route::post('group/add', 'GroupController@add');
Route::post('group/del/{id}', 'GroupController@del');
Route::post('group/update/{id}', 'GroupController@update');
Route::get('group/list/{id}', 'GroupController@getListById');
Route::get('group/list', 'GroupController@getList');

Route::post('position/add', 'PositionController@add');
Route::post('position/del/{id}', 'PositionController@del');
Route::post('position/update/{id}', 'PositionController@update');
Route::get('position/list/{id}', 'PositionController@getListById');
Route::get('position/list', 'PositionController@getList');

Route::post('studio/add', 'StudioController@add');
Route::post('studio/del/{id}', 'StudioController@del');
Route::post('studio/update/{id}', 'StudioController@update');
Route::get('studio/list/{id}', 'StudioController@getListById');
Route::get('studio/list', 'StudioController@getList');
