<?php
    
	Route::group(['prefix' => 'comments', 'as' => 'comments.'], function () {
    Route::post('add', 'comments\commentssystem\CommentsController@add')->name('add');
	});	


	Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:admin']], function () {

    Route::get('comments', 'comments\commentssystem\CommentsController@index')->name('comments');
    Route::post('comments/approve/{commentid}', 'comments\commentssystem\CommentsController@approve')->name('comments.approve');
    Route::post('comments/repply', 'comments\commentssystem\CommentsController@repply')->name('comments.repply');
    Route::delete('comments/destroy/{commentid}', 'comments\commentssystem\CommentsController@destroy')->name('comments.destroy');
    Route::post('comments/add', 'comments\commentssystem\CommentsController@adminadd')->name('comments.add');

	});
