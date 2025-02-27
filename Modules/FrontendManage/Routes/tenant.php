<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'frontend', 'as' => 'frontend.', 'middleware' => ['auth', 'admin']], function () {

    //sponsor
    Route::resource('/sponsors', 'SponsorController')->except('update', 'destroy');
    Route::post('/sponsors/update', 'SponsorController@update')->name('sponsors.update');
    Route::get('/sponsors/destroy/{id}', 'SponsorController@destroy')->name('sponsors.destroy');

//sliders
    Route::resource('/sliders', 'SliderController')->except('show', 'update', 'destroy');
    Route::post('/sliders/update', 'SliderController@update')->name('sliders.update');
    Route::get('/sliders/destroy/{id}', 'SliderController@destroy')->name('sliders.destroy');
    Route::get('/sliders/setting', 'SliderController@setting')->name('sliders.setting');
    Route::post('/sliders/setting', 'SliderController@settingSubmit');

//sliders
    Route::resource('/requirements_slider', 'RequirementsSliderController')->except('show', 'update', 'destroy');
    Route::post('/requirements_slider/update', 'RequirementsSliderController@update')->name('requirements_slider.update');
    Route::get('/requirements_slider/destroy/{id}', 'RequirementsSliderController@destroy')->name('requirements_slider.destroy');
    Route::get('/requirements_slider/setting', 'RequirementsSliderController@setting')->name('requirements_slider.setting');
    Route::post('/requirements_slider/setting', 'RequirementsSliderController@settingSubmit');

//resource center
    Route::resource('/resource_center', 'ResourceController')->except('show', 'update', 'destroy');
    Route::post('/resource_center/update', 'ResourceController@update')->name('resource_center.update');
    Route::get('/resource_center/destroy/{id}', 'ResourceController@destroy')->name('resource_center.destroy');
    // Route::get('/resource_center/setting', 'ResourceController@setting')->name('resource_center.setting');
    Route::post('/resource_center/setting', 'ResourceController@settingSubmit')->name('resource_center.setting');
    Route::post('/resource_center/changeTabSequence', 'ResourceController@changeTabSequence')->name('resource_center.changeTabSeq');


    Route::resource('/why', 'WhyController')->except('show', 'update', 'destroy');
    Route::post('/why/update', 'WhyController@update')->name('why.update');
    Route::get('/why/destroy/{id}', 'WhyController@destroy')->name('why.destroy');

    Route::get('/', 'FrontendManageController@index')->name('home');
    Route::get('about', 'FrontendManageController@about')->name('about');
    Route::get('privacy', 'FrontendManageController@privacy')->name('privacy');

    // testimonials
    Route::get('testimonials', 'FrontendManageController@testimonials')->name('testimonials');
    Route::post('testimonials-store', 'FrontendManageController@testimonials_store')->name('testimonials_store');
    Route::post('testimonials-update', 'FrontendManageController@testimonials_update')->name('testimonials_update');
    Route::get('testimonials-edit/{id}', 'FrontendManageController@testimonials_edit')->name('testimonials_edit');
    Route::get('testimonials-delete/{id}', 'FrontendManageController@testimonials_delete')->name('testimonials_delete');


    Route::get('social-setting', 'FrontendManageController@socialSetting')->name('socialSetting')->middleware('RoutePermissionCheck:frontend.socialSetting');
    Route::get('social-setting/{id}', 'FrontendManageController@socialSettingEdit')->name('socialSetting_edit');
    Route::get('social-setting-delete/{id}', 'FrontendManageController@socialSettingDelete')->name('socialSetting.delete');
    Route::post('social-setting', 'FrontendManageController@socialSettingSave')->name('socialSetting.store')->middleware('RoutePermissionCheck:frontend.socialSetting.store');
    Route::post('social-setting-update', 'FrontendManageController@socialSettingUpdate')->name('socialSetting.update')->middleware('RoutePermissionCheck:frontend.socialSetting.update');
    Route::post('social-links/changeOrder', 'FrontendManageController@changeSocialLinkOrder')->name('socialSetting.changeSocialLinkOrder')->middleware('RoutePermissionCheck:frontend.socialSetting.update');

    Route::get('section-setting', 'FrontendManageController@sectionSetting')->name('sectionSetting')->middleware('RoutePermissionCheck:frontend.sectionSetting');
    Route::get('section-setting-edit/{id}', 'FrontendManageController@sectionSettingEdit')->name('sectionSetting_edit')->middleware('RoutePermissionCheck:frontend.sectionSetting.edit');
    Route::post('section-setting-store', 'FrontendManageController@sectionSetting')->name('sectionSetting_store')->middleware('RoutePermissionCheck:frontend.socialSetting.store');
    Route::post('section-setting-update', 'FrontendManageController@sectionSetting_update')->name('sectionSetting_update')->middleware('RoutePermissionCheck:frontend.sectionSetting.edit');

    // Home Content
    Route::get('home-content', 'FrontendManageController@HomeContent')->name('homeContent');
    Route::post('home-content', 'FrontendManageController@HomeContentUpdate')->name('homeContent_Update');

    //Topbar Setting
    Route::get('top-bar-settings', 'FrontendManageController@showTopBarSettings')->name('showTopBarSettings');
    Route::post('top-bar-settings', 'FrontendManageController@saveTopBarSettings')->name('saveTopBarSettings');
    //Topbar Setting
    Route::get('course-settings', 'FrontendManageController@showCourseSettings')->name('showCourseSettings');
    Route::post('course-settings', 'FrontendManageController@saveCourseSettings')->name('saveCourseSettings');

    Route::get('page-content', 'FrontendManageController@pageContent')->name('pageContent');
    Route::post('page-content', 'FrontendManageController@pageContentUpdate')->name('pageContent_Update');


    Route::get('contact-page', 'FrontendManageController@ContactPageContent')->name('ContactPageContent');
    Route::post('contact-page', 'FrontendManageController@ContactPageContentUpdate')->name('ContactPageContentUpdate');
    Route::get('contact-messages', 'FrontendManageController@contactMessages')->name('contactMessages');
    Route::post('fetchContactMessage', 'FrontendManageController@fetchContactMessage')->name('fetchContactMessage');

    // Home Content
    Route::get('privacy-policy', 'FrontendManageController@PrivacyPolicy')->name('privacy_policy');
    Route::post('privacy-policy', 'FrontendManageController@PrivacyPolicyUpdate')->name('privacy_policy_Update');

    Route::get('about', 'FrontendManageController@AboutPage')->name('AboutPage');
    Route::post('about', 'FrontendManageController@saveAboutPage')->name('saveAboutPage');

    Route::post('homepage-block-order', 'FrontendManageController@changeHomePageBlockOrder')->name('changeHomePageBlockOrder');


    //Page Builder
    Route::resource('page', 'FrontPageController');
    Route::get('change-homepage/{id}', 'FrontPageController@changeHomepage')->name('page.changeHomepage')->middleware('RoutePermissionCheck:frontend.page.changeHomepage');


    Route::get('/becomeInstructor', 'BecomeInstructorSettingController@index')->name('becomeInstructor');
    Route::get('/becomeInstructorStore/{id}', 'BecomeInstructorSettingController@store')->name('becomeInstructorStore');
    Route::get('/becomeInstructorEdit/{id}', 'BecomeInstructorSettingController@edit')->name('becomeInstructorEdit');
    Route::post('/becomeInstructorUpdate', 'BecomeInstructorSettingController@update')->name('becomeInstructorUpdate');

    // Work Process Manage
    Route::get('/workProcess', 'BecomeInstructorSettingController@allWork')->name('workProcess');
    Route::post('/workProcessStore', 'BecomeInstructorSettingController@store')->name('workProcessStore');
    Route::get('/workProcessEdit/{id}', 'BecomeInstructorSettingController@editWork')->name('workProcessEdit');
    Route::post('/workProcessUpdate', 'BecomeInstructorSettingController@updateWork')->name('workProcessUpdate');
    Route::get('/workProcessDestroy/{id}', 'BecomeInstructorSettingController@destroy')->name('workProcessDestroy');


    Route::get('/loginpage', 'LoginPageController@index')->name('loginpage.index');
    Route::post('/loginpage', 'LoginPageController@store')->name('loginpage.store');


    Route::get('/menusetting', 'MenuSettingController@index')->name('menusetting')->middleware('RoutePermissionCheck:frontend.menusetting');
    Route::post('/menusetting', 'MenuSettingController@store');

    Route::get('/headermenu', 'HeaderMenuController@index')->name('headermenu')->middleware('RoutePermissionCheck:frontend.headermenu');
    Route::post('/headermenu-add', 'HeaderMenuController@addElement')->name('headermenu.add-element')->middleware('RoutePermissionCheck:frontend.headermenu.add-element');
    Route::post('/headermenu-edit', 'HeaderMenuController@editElement')->name('headermenu.edit-element')->middleware('RoutePermissionCheck:frontend.headermenu.edit-element');
    Route::post('/headermenu-reordering', 'HeaderMenuController@reordering')->name('headermenu.reordering')->middleware('RoutePermissionCheck:frontend.headermenu.reordering');
    Route::post('/headermenu-delete', 'HeaderMenuController@deleteElement')->name('headermenu.delete')->middleware('RoutePermissionCheck:frontend.headermenu.delete');


    Route::get('/faq', 'HomePageFaqController@index')->name('faq.index')->middleware('RoutePermissionCheck:frontend.faq.index');
    Route::post('/faq-store', 'HomePageFaqController@store')->name('faq.store')->middleware('RoutePermissionCheck:frontend.faq.store');
    Route::post('/faq-update', 'HomePageFaqController@update')->name('faq.update')->middleware('RoutePermissionCheck:frontend.faq.update');
    Route::post('/faq-delete', 'HomePageFaqController@destroy')->name('faq.destroy')->middleware('RoutePermissionCheck:frontend.faq.destroy');
    Route::post('/change-home-page-faq-position', 'HomePageFaqController@changeFaqPosition')->name('changeHomePageFaqPosition')->middleware('RoutePermissionCheck:frontend.faq.index');

    Route::get('/custom-css-js', 'CustomStyleScriptController@index')->name('customJsCss')
        ->middleware('RoutePermissionCheck:frontend.customJsCss');
    Route::post('/custom-css-js', 'CustomStyleScriptController@store');

});
