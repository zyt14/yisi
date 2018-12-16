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

Route::get('list/{id}', 'UserController@categoryListTwe');


