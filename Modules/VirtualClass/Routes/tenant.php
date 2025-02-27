<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'virtualclass', 'middleware' => ['auth', 'admin']], function () {
    Route::resource('virtual-class', 'VirtualClassController')->middleware('RoutePermissionCheck:virtual-class.index')->except('destroy');
    Route::post('virtual-class-delete', 'VirtualClassController@destroy')->name('virtual-class.destroy')->middleware('RoutePermissionCheck:virtual-class.index');
    Route::get('/all/virtual-class-data', 'VirtualClassController@getAllVirtualClassData')->name('getAllVirtualClassData')->middleware('RoutePermissionCheck:virtual-class.index');

    Route::get('virtual-class-setting', 'VirtualClassController@setting')->name('virtual-class.setting')->middleware('RoutePermissionCheck:virtual-class.setting');
    Route::post('virtual-class-setting-update', 'VirtualClassController@settingUpdate')->name('setting.update')->middleware('RoutePermissionCheck:virtual-class.setting');
    Route::get('virtual-class-details/{id}', 'VirtualClassController@details')->name('virtual-class.details')->middleware('RoutePermissionCheck:virtual-class.index');
    Route::get('virtual-class-create/{id}', 'VirtualClassController@createMeeting')->name('virtual-class.createMeeting')->middleware('RoutePermissionCheck:virtual-class.create');
    Route::post('virtual-class-create/{id}', 'VirtualClassController@createMeetingStore')->name('virtual-class.createMeetingStore')->middleware('RoutePermissionCheck:virtual-class.create');
    Route::post('bbb-virtual-class-create/{id}', 'VirtualClassController@bbbMeetingStore')->name('virtual-class.bbbMeetingStore')->middleware('RoutePermissionCheck:virtual-class.create');
    Route::post('jitsi-virtual-class-create/{id}', 'VirtualClassController@jitsiMeetingStore')->name('virtual-class.jitsiMeetingStore')->middleware('RoutePermissionCheck:virtual-class.create');
     Route::get('getcourses', 'VirtualClassController@getcourses');
     Route::get('getprogram', 'VirtualClassController@getprogram');
     Route::get('getinstructorcourses', 'VirtualClassController@getinstructorcourses');
     Route::get('getcoursetype', 'VirtualClassController@getcoursetype');
     
     Route::post('validateClass', 'VirtualClassController@validateClass');
     Route::post('mergeCourseTypeExist', 'VirtualClassController@mergeCourseTypeExist');
});
