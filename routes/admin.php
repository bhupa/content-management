<?php

/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth:admin', 'preventBackHistory'], 'prefix' => 'admin'], function () {
    Route::get('error-logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::post('reset_password', 'AdminListController@resetPassword')->name('admin.reset_password');

//
//    Route::group(['prefix' => 'configuration'], function () {
//        Route::resource('fare-chart', 'FareChartController', ['as' => 'admin.configuration']);
//        Route::resource('payment-method', 'PaymentMethodController', ['as' => 'admin.configuration']);
//        Route::post('payment-method/change-status', array('as' => 'admin.configuration.payment-method.change-status', 'uses' => 'PaymentMethodController@changeStatus'));
//
//    });

    Route::resource('admin-type', 'AdminTypeController', ['as' => 'admin']);
    Route::post('admin-type/change-status', array('as' => 'admin.admin-type.change-status', 'uses' => 'AdminTypeController@changeStatus'));

    Route::prefix('admin-access')->group(function(){
        Route::get('/{admin_type_id}/create', 'AdminAccessController@create')->name('admin.admin-access.create');
        Route::post('/{admin_type_id}/store', 'AdminAccessController@store')->name('admin.admin-access.store');

    });

    Route::prefix('admin-list')->group(function(){
        Route::get('/{admin_type_id}','AdminListController@index')->name('admin.admin-list.index');
        Route::get('/{admin_type_id}/create', 'AdminListController@create')->name('admin.admin-list.create');
        Route::post('/{admin_type_id}/store', 'AdminListController@store')->name('admin.admin-list.store');
        Route::get('/{admin_type_id}/edit', 'AdminListController@edit')->name('admin.admin-list.edit');

        Route::post('change-status', 'AdminListController@changeStatus')->name('admin.admin-list.change-status');
        Route::delete('/{admin_type_id}/{admin_id}', 'AdminListController@destroy')->name('admin.admin-list.destroy');
    });
    Route::post('/admin-list/{admin_type_id}/update', 'AdminListController@update')->name('admin.admin-list.update');

    Route::resource('module', 'ModuleController', ['as' => 'admin']);
    Route::get('/','ModuleController@index')->name('admin.module.index');
    Route::post('module/change-status', array('as' => 'admin.module.change-status', 'uses' => 'ModuleController@changeStatus'));

    Route::get('/create', 'ModuleController@create')->name('admin.module.create');
    Route::post('/store', 'ModuleController@store')->name('admin.module.store');
    Route::delete('destroy/{id}', 'ModuleController@destroy')->name('admin.module.destroy');
    Route::get('edit/{id}', 'ModuleController@edit')->name('admin.module.edit');



    Route::resource('contents', 'ContentController', ['as' => 'admin']);
    Route::post('content/change-status', 'ContentController@changeStatus')->name('admin.contents.change-status');
     Route::post('contents/sort', array('as' => 'admin.contents.sort', 'uses' => 'ContentController@sort'));





    Route::resource('gallery', 'GalleryController', ['as' => 'admin']);
    Route::post('gallery/change-status', array('as' => 'admin.gallery.change-status', 'uses' => 'GalleryController@changeStatus'));
    Route::post('gallery/sort', array('as' => 'admin.gallery.sort', 'uses' => 'GalleryController@sort'));

    Route::prefix('gallery/image')->group(function(){
        Route::get('/{gallery_id}','GalleryImageController@index')->name('admin.gallery-image.index');
        Route::get('/{gallery_id}/create', 'GalleryImageController@create')->name('admin.gallery-image.create');
        Route::post('/{gallery_id}/store', 'GalleryImageController@store')->name('admin.gallery-image.store');
        Route::delete('/{gallery_id}/{image_id}', 'GalleryImageController@destroy')->name('admin.gallery-image.destroy');

    });




    Route::resource('email-subscribe', 'EmailSubscribeController', ['as' => 'admin']);
    Route::get('/', 'EmailSubscribeController@index')->name('admin.email-subscribe.index');
    Route::delete('destroy/{id}', 'EmailSubscribeController@destroy')->name('admin.email-subscribe.destroy');
    Route::post('email-subscribe/change-status', array('as' => 'admin.email-subscribe.change-status', 'uses' => 'EmailSubscribeController@changeStatus'));






    Route::resource('event', 'EventController', ['as' => 'admin']);
    Route::get('/','EventController@index')->name('admin.event.index');
    Route::get('/create', 'EventController@create')->name('admin.event.create');
    Route::post('/store', 'EventController@store')->name('admin.event.store');
    Route::delete('destroy/{id}', 'EventController@destroy')->name('admin.event.destroy');
    Route::get('edit/{id}', 'EventController@edit')->name('admin.event.edit');
    Route::post('event/change-status', 'EventController@changeStatus')->name('admin.event.change-status');
    Route::post('event/sort', 'EventController@sort')->name('admin.event.sort');






    Route::resource('testimonials', 'TestimonialsController', ['as' => 'admin']);
    Route::post('testimonials/sort', array('as' => 'admin.testimonials.sort', 'uses' => 'TestimonialsController@sort'));
    Route::post('testimonials/change-status', 'TestimonialsController@changeStatus')->name('admin.testimonials.change-status');
    Route::post('testimonials/sort', array('as' => 'admin.testimonials.sort', 'uses' => 'TestimonialsController@sort'));











    Route::resource('member-type', 'MemberTypeController', ['as' => 'admin']);
    Route::post('member-type/change-status', array('as' => 'admin.member-type.change-status', 'uses' => 'MemberTypeController@changeStatus'));
    Route::get('/','MemberTypeController@index')->name('admin.member-type.index');
    Route::get('/create', 'MemberTypeController@create')->name('admin.member-type.create');
    Route::post('/store', 'MemberTypeController@store')->name('admin.member-type.store');
    Route::delete('destroy/{image_id}', 'MemberTypeController@destroy')->name('admin.member-type.destroy');
    Route::get('edit/{id}', 'MemberTypeController@edit')->name('admin.member-type.edit');
    Route::post('update/{id}', 'MemberTypeController@update')->name('admin.member-type.update');

    Route::resource('member', 'MembersController', ['as' => 'admin']);
    Route::post('member/change-status', array('as' => 'admin.member.change-status', 'uses' => 'MembersController@changeStatus'));
    Route::get('/','MemberControllers@index')->name('admin.member.index');
    Route::get('/create', 'MemberControllers@create')->name('admin.member.create');
    Route::post('/store', 'MemberControllers@store')->name('admin.member.store');
    Route::delete('destroy/{id}', 'MemberControllers@destroy')->name('admin.member.destroy');
    Route::get('edit/{id}', 'MemberControllers@edit')->name('admin.member.edit');
    Route::post('update/{id}', 'MemberControllers@update')->name('admin.member.update');
    Route::post('member/sort', array('as' => 'admin.member.sort', 'uses' => 'MembersController@sort'));


  Route::resource('setting', 'SiteSettingController', ['as' => 'admin']);
    Route::get('/','SiteSettingController@index')->name('admin.setting.index');
    Route::post('setting/change-status', array('as' => 'admin.setting.change-status', 'uses' => 'SiteSettingController@changeStatus'));

    Route::get('/create', 'SiteSettingController@create')->name('admin.setting.create');
    Route::post('/store', 'SiteSettingController@store')->name('admin.setting.store');
    Route::delete('destroy/{id}', 'SiteSettingController@destroy')->name('admin.setting.destroy');
    Route::get('edit/{id}', 'SiteSettingController@edit')->name('admin.setting.edit');
//    Route::post('/{id}/update', 'SiteSettingController@update')->name('admin.setting.update');


    Route::resource('video', 'GalleryVideoController', ['as' => 'admin']);
//    Route::post('gallery-video/change-status', array('as' => 'admin.gallery-video.change-status', 'uses' => 'GalleryVideoController@changeStatus'));
//    Route::post('gallery-video/sort', array('as' => 'admin.gallery-video.sort', 'uses' => 'GalleryVideoController@sort'));
    Route::get('/video/show/{slug}','GalleryVideoController@show')->name('admin.video.show');
    Route::get('/create/{id}','GalleryVideoController@create')->name('admin.video.create');

    Route::resource('notice', 'NoticeController', ['as' => 'admin']);
    Route::post('notice/change-status', array('as' => 'admin.notice.change-status', 'uses' => 'NoticeController@changeStatus'));
    Route::post('notice/sort', array('as' => 'admin.notice.sort', 'uses' => 'NoticeController@sort'));

    Route::resource('banner', 'BannerController', ['as' => 'admin']);
    Route::post('banner/change-status', array('as' => 'admin.banner.change-status', 'uses' => 'BannerController@changeStatus'));
    Route::post('banner/sort', array('as' => 'admin.banner.sort', 'uses' => 'BannerController@sort'));





    Route::group(['prefix' => 'blog'], function () {
        Route::resource('category', 'BlogCategoryController', ['as' => 'admin.blog']);
        Route::post('blog/category/change-status', array('as' => 'admin.blog.category.change-status', 'uses' => 'BlogCategoryController@changeStatus'));
    });


    Route::resource('blog', 'BlogController', ['as' => 'admin']);
    Route::get('/create', 'BlogController@create')->name('admin.blog.create');
    Route::get('/', 'BlogController@index')->name('admin.blog.index');
    Route::get('/show/{id}', 'BlogController@show')->name('admin.blog.show');
    Route::get('/blog/{id}/edit', 'BlogController@edit')->name('admin.blog.edit');
//    Route::post('/{id}/update', 'ProjectController@update')->name('admin.project.update');
    Route::delete('/{id}/', 'BlogController@destroy')->name('admin.blog.destroy');

    Route::post('blog/change-status', array('as' => 'admin.blog.change-status', 'uses' => 'BlogController@changestatus'));





    Route::resource('faq', 'FaqController', ['as' => 'admin']);
    Route::get('/create', 'FaqController@create')->name('admin.faq.create');
    Route::get('/', 'FaqController@index')->name('admin.faq.index');
    Route::get('/show/{id}', 'FaqController@show')->name('admin.faq.show');
    Route::get('/faq/{id}/edit', 'FaqController@edit')->name('admin.faq.edit');
//    Route::post('/{id}/update', 'ProjectController@update')->name('admin.project.update');
    Route::delete('/{id}/', 'ProgramController@destroy')->name('admin.faq.destroy');

    Route::post('faq/change-status', array('as' => 'admin.faq.change-status', 'uses' => 'FaqController@changestatus'));
    Route::post('faq/sort', array('as' => 'admin.faq.sort', 'uses' => 'FaqController@sort'));





    Route::resource('team', 'TeamController', ['as' => 'admin']);
    Route::get('/create', 'TeamController@create')->name('admin.team.create');
    Route::get('/', 'TeamController@index')->name('admin.team.index');
    Route::get('/show/{id}', 'TeamController@show')->name('admin.team.show');
    Route::get('/team/{id}/edit', 'TeamController@edit')->name('admin.team.edit');
//    Route::post('/{id}/update', 'ProjectController@update')->name('admin.project.update');
    Route::delete('/{id}/', 'TeamController@destroy')->name('admin.team.destroy');

    Route::post('team/change-status', array('as' => 'admin.team.change-status', 'uses' => 'TeamController@changestatus'));
    Route::post('team/sort', array('as' => 'admin.team.sort', 'uses' => 'TeamController@sort'));





    Route::resource('contact', 'ContactController', ['as' => 'admin']);
    Route::get('/create', 'ContactController@create')->name('admin.contact.create');
    Route::get('/', 'ContactController@index')->name('admin.contact.index');
    Route::get('/show/{id}', 'ContactController@show')->name('admin.contact.show');
    Route::get('/contact/{id}/edit', 'ContactController@edit')->name('admin.contact.edit');
//    Route::post('/{id}/update', 'ProjectController@update')->name('admin.project.update');
    Route::delete('/{id}/', 'ContactController@destroy')->name('admin.contact.destroy');





});

