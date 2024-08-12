<?php

use Illuminate\Support\Facades\Route;


Route::prefix('team')->group(function () {
    Route::name('team.')->middleware('auth')->group(function () {
        Route::get('about', 'MeetingController@about');

        Route::get('meetings', 'MeetingController@index')->name('meetings')->middleware('RoutePermissionCheck:team.meetings.index');
        Route::post('meetings', 'MeetingController@store')->name('meetings.store')->middleware('RoutePermissionCheck:team.meetings.store');
        Route::get('meetings-show/{id}', 'MeetingController@show')->name('meetings.show')->middleware('RoutePermissionCheck:team.meetings');
        Route::get('meetings-edit/{id}', 'MeetingController@edit')->name('meetings.edit')->middleware('RoutePermissionCheck:virtual-class.edit');
        Route::post('meetings/{id}', 'MeetingController@update')->name('meetings.update')->middleware('RoutePermissionCheck:virtual-class.edit');
        Route::post('meetings-cancel', 'MeetingController@cancel')->name('meetings.cancel')->middleware('RoutePermissionCheck:virtual-class.edit');
        Route::delete('meetings/{id}', 'MeetingController@destroy')->name('meetings.destroy')->middleware('RoutePermissionCheck:team.meetings.destroy');

        Route::get('settings', 'SettingController@settings')->name('settings')->middleware('RoutePermissionCheck:team.settings');
        Route::post('settings', 'SettingController@updateSettings')->name('settings.update')->middleware('RoutePermissionCheck:team.settings');
        Route::get('user-list-user-type-wise', 'MeetingController@userWiseUserList')->name('user.list.user.type.wise');
        Route::get('virtual-class-room/{id}', 'MeetingController@meetingStart')->name('meeting.join');


    });
});
