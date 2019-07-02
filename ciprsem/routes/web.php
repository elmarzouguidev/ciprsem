<?php



Route::group(
    [
        'prefix'     => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect']
    ]
    ,
    function()
    {


        Route::get('/',[ 'as'=>'home','uses'=>'HomeController@index']);

        Route::get('/news',[ 'as'=>'news','uses'=>'HomeController@news']);

        Route::get('/news/{slug}',[ 'as'=>'news.single','uses'=>'HomeController@news_single']);
        Route::post('comments/{article_id}',
            ['as'=>'comment.store','uses'=>'CommentsController@store']
        );


        Route::get('/activities/',[ 'as'=>'activities','uses'=>'HomeController@activities']);
        Route::get('/activities/{slug}',[ 'as'=>'activities.single','uses'=>'HomeController@activities_single']);
        Route::get('/histoire/',[ 'as'=>'histoire','uses'=>'HomeController@histoire']);
        Route::get('/histoire/{slug?}',[ 'as'=>'histoire','uses'=>'HomeController@histoire_single']);
        Route::get('/kitabat/',[ 'as'=>'kitabat','uses'=>'HomeController@kitabat']);

        Route::get('/photos/',[ 'as'=>'photos','uses'=>'HomeController@photos']);
        //Route::get('/photos/',[ 'as'=>'photos','uses'=>'HomeController@photoscat']);
        Route::get('/videos/',[ 'as'=>'videos','uses'=>'HomeController@videos']);

        Route::get('/team/',[ 'as'=>'profiles','uses'=>'HomeController@profiles']);

        Route::get('/team/{name}',[ 'as'=>'profiles.single','uses'=>'HomeController@single_profile']);

        Route::get('/contact-us/',[ 'as'=>'contact.us','uses'=>'HomeController@contact_us']);
        Route::post('/contact-us/',[ 'as'=>'contact.us.ok','uses'=>'HomeController@contact_us_send']);

        Route::get('/about-us/',[ 'as'=>'about.us','uses'=>'HomeController@about_us']);

        /****  login user to profil*******************************************************/

        Route::get('/ciprsem-login/',  [ 'as'=>'login','uses'=>'Auth\LoginController@showLoginForm']);

        Route::post('/ciprsem-login/', [ 'as'=>'login','uses'=>'Auth\LoginController@login']);

        Route::get('/logout', [ 'as'=>'logout','uses'=>'Auth\LoginController@logout']);


        /**********************************************************************************/
        /****************************************profile to do *************************************/
        Route::get('/profile/{name?}',[ 'as'=>'profile','uses'=>'ProfileController@index']);
        Route::get('/profile/{name}/manager/home',[ 'as'=>'profile.manager','uses'=>'ProfileController@manager']);
        Route::get('/profile/articles/create',[ 'as'=>'article.create','uses'=>'ArticleController@create']);
        Route::post('/profile/articles/create',[ 'as'=>'article.store','uses'=>'ArticleController@store']);

        Route::get('/profile/articles/all',[ 'as'=>'article.show.all','uses'=>'ArticleController@index']);
        Route::get('/profile/articles/all/need/translate',[ 'as'=>'article.show.all.need.translated','uses'=>'ArticleController@need_translate']);
        Route::get('/profile/articles/all/need/translate/{id}',[ 'as'=>'article.need.translated','uses'=>'ArticleController@need_translate_update']);
        Route::post('/profile/articles/all/need/translate/{id}',[ 'as'=>'article.translated','uses'=>'ArticleController@translate_update']);

        Route::get('/profile/articles/all/show/{id}',[ 'as'=>'article.show','uses'=>'ArticleController@article_edite']);
        Route::get('/profile/articles/all/edit/{id}',[ 'as'=>'article.edit','uses'=>'ArticleController@article_edite']);

        Route::delete('/profile/articles/all/delete/{id}',[ 'as'=>'article.delete','uses'=>'ArticleController@article_delete']);

        Route::get('/profile/activities/create',[ 'as'=>'activities.create','uses'=>'ActivitiesController@create']);
        Route::post('/profile/activities/create',[ 'as'=>'activities.store','uses'=>'ActivitiesController@store']);

        Route::post('/profile/photos/create',[ 'as'=>'photo.store','uses'=>'PhotoController@store']);

        Route::get('/profile/photos/all/',[ 'as'=>'photo.all','uses'=>'PhotoController@all']);
        Route::post('/profile/videos/create',[ 'as'=>'video.store','uses'=>'VideoController@store']);
        Route::get('/profile/photos/delete/{id}',[ 'as'=>'photo.delete','uses'=>'PhotoController@photo_delete']);

        Route::get('/profile/{name}/personel/',[ 'as'=>'personel.info','uses'=>'ProfileController@myinfo']);
        Route::get('/profile/{name}/about',[ 'as'=>'personel.about','uses'=>'ProfileController@myinfo_about']);
        Route::post('/profile/{name}/about/',[ 'as'=>'about.store','uses'=>'ProfileController@myinfo_about_store']);
        Route::post('/profile/{name}/about/info',[ 'as'=>'info.store','uses'=>'ProfileController@myinfo_store']);
        Route::post('/profile/{name}/about/backgroung',[ 'as'=>'about.photo.ground.store','uses'=>'ProfileController@myinfo_about_store_photo_ground']);

        Route::post('/profile/{name}/about/photo',[ 'as'=>'about.photo.store','uses'=>'ProfileController@myinfo_about_store_photo']);

        /*** Password reset for User *******************************************************/

        Route::get('/ciprsem-password/ciprsem-reset',

            [   'as'=>'password.request',
                'uses'=>'Auth\ForgotPasswordController@showLinkRequestForm'
            ]);

        Route::post('/ciprsem-password/ciprsem-email',

            [   'as'=>'password.email',
                'uses'=>'Auth\ForgotPasswordController@sendResetLinkEmail'
            ]);

        Route::get('/ciprsem-password/ciprsem-reset/{token}',

            [   'as'=>'password.reset',
                'uses'=>'Auth\ResetPasswordController@showResetForm'
            ]);

        Route::post('/ciprsem-password/ciprsem-reset',

            [   'as'=>'password.change',
                'uses'=>'Auth\ResetPasswordController@reset'
            ]);

        /**********************************************************************************/
        Route::get('/register',  [ 'as'=>'register','uses'=>'Auth\RegisterController@showRegistrationForm']);
        Route::post('/register',  [ 'as'=>'register','uses'=>'Auth\RegisterController@register']);

    });

Route::group(
    [
        'prefix'     => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect']
    ]
    ,
    function()
    {

        Route::prefix('admin')->group(function (){

            /*** Administration *******************************************************/
            Route::get('logout',[ 'as'=>'logout.admin','uses'=>'Auth\AdminLoginController@logout']);
            Route::get('login',[ 'as'=>'admin.login','uses'=>'Auth\AdminLoginController@showLoginForm']);
            Route::post('login',[ 'as'=>'admin.login.ok','uses'=>'Auth\AdminLoginController@login']);
            Route::get('home',[ 'as'=>'admin.home','uses'=>'AdminController@index']);


            Route::get('article/create' ,[ 'as'=>'admin.article.create','uses'=>'AdminController@create_article']);
            Route::post('article/create',[ 'as'=>'admin.article.store','uses'=>'AdminController@store_article']);
            Route::get('article/',
                [ 'as'=>'admin.article.all',
                    'uses'=>'AdminController@all_article',
                    'middleware' => 'roles',
                    'roles'=>['Global-Admin']
                ]);

            Route::get('article/enable/{id}',[ 'as'=>'admin.article.enable','uses'=>'AdminController@enable']);

            Route::get('/article/edit/{id}',[ 'as'=>'admin.article.edit','uses'=>'AdminController@edit_article']);
            Route::post('/article/edit/{id}',[ 'as'=>'admin.article.edit.save','uses'=>'AdminController@save_edit_article']);
            Route::get('article/comments/{id}',[ 'as'=>'admin.article.comments','uses'=>'AdminController@all_article_comments']);
            Route::delete('article/comments/delete/{id}',
                ['as'=>'admin.comment.delete','uses'=>'CommentsController@destroy']
            );

            Route::get('article/comments/enable/{id}' ,[ 'as'=>'admin.comments.enable','uses'=>'AdminController@enable_comments']);

            Route::delete('/article/delete/{id}',[ 'as'=>'admin.article.delete','uses'=>'AdminController@delete_article']);
            Route::get('/article/trans/',[ 'as'=>'admin.article.trans','uses'=>'AdminController@trans_article']);
            Route::get('/article/trans/{id}',[ 'as'=>'admin.article.trans.single','uses'=>'AdminController@trans_article_single']);
            Route::post('/article/trans/{id}',[ 'as'=>'admin.article.trans.save','uses'=>'AdminController@save_trans_article']);

            Route::get('activities/create', [ 'as'=>'admin.activities.create','uses'=>'AdminController@create_activities']);
            Route::post('activities/create',[ 'as'=>'admin.activities.store','uses'=>'AdminController@store_activities']);
            Route::get('activities/',[ 'as'=>'admin.activities.all','uses'=>'AdminController@all_activities']);
            Route::get('/activities/edit/{id}',[ 'as'=>'admin.activities.edit','uses'=>'AdminController@edit_activities']);
            Route::get('activities/enable/{id}',[ 'as'=>'admin.activities.enable','uses'=>'AdminController@activities_enable']);
            Route::get('activities/disable/{id}',[ 'as'=>'admin.activities.disable','uses'=>'AdminController@activities_disable']);
            Route::post('/activities/edit/{id}',[ 'as'=>'admin.activities.edit.save','uses'=>'AdminController@save_edit_activities']);
            Route::delete('/activities/delete/{id}',[ 'as'=>'admin.activities.delete','uses'=>'AdminController@delete_activities']);
            Route::get('/activities/trans/',[ 'as'=>'admin.activities.trans','uses'=>'AdminController@trans_activities']);
            Route::get('/activities/trans/{id}',[ 'as'=>'admin.activities.trans.single','uses'=>'AdminController@trans_activities_single']);
            Route::post('/activities/trans/{id}',[ 'as'=>'admin.activities.trans.save','uses'=>'AdminController@save_trans_activities']);

            Route::get('videos/create',[ 'as'=>'admin.videos.create','uses'=>'AdminController@create_videos']);
            Route::post('videos/create',[ 'as'=>'admin.videos.store','uses'=>'AdminController@store_videos']);
            Route::get('videos/',[ 'as'=>'admin.videos.all','uses'=>'AdminController@all_videos']);
            Route::get('/videos/edit/{id}',[ 'as'=>'admin.videos.edit','uses'=>'AdminController@edit_videos']);
            Route::post('/videos/edit/{id}',[ 'as'=>'admin.videos.edit.save','uses'=>'AdminController@save_edit_videos']);
            Route::delete('/videos/delete/{id}',[ 'as'=>'admin.videos.delete','uses'=>'AdminController@delete_videos']);

            Route::post('photos/create',[ 'as'=>'admin.photos.store','uses'=>'AdminController@store_photos']);
            Route::get('photos/',[ 'as'=>'admin.photos.all','uses'=>'AdminController@all_photos']);
            Route::delete('photos/delete/{id}',[ 'as'=>'admin.photos.delete','uses'=>'AdminController@delete_photos']);

            Route::get('categories/',[ 'as'=>'admin.categories.create','uses'=>'AdminController@create_categories']);
            Route::post('categories/',[ 'as'=>'admin.categories.store','uses'=>'AdminController@store_categories']);
            Route::delete('categories/delete/{id}',[ 'as'=>'admin.categories.delete','uses'=>'AdminController@delete_categories']);

            Route::get('about/',[ 'as'=>'admin.about.add','uses'=>'AdminController@about']);
            Route::post('about/',[ 'as'=>'admin.about.store','uses'=>'AdminController@about_store']);

            Route::get('users/add',
                ['as'=>'admin.users.add',
                    'uses'=>'AdminController@create_users',
                    'middleware' => 'roles',
                    'roles'=>['Administrator','Global-Admin'],

                ]);
            Route::post('users/add',[ 'as'=>'admin.users.store','uses'=>'AdminController@store_users']);

            Route::get('users/',
                [   'as'=>'admin.users.all',
                    'uses'=>'AdminController@all_users',
                    'middleware' => 'roles',
                    'roles'=>['Administrator','Global-Admin']
                ]);
            Route::get('users/active/{id}',['uses'=>'AdminController@active_user']);

            Route::get('users/roles/admins',[ 'as'=>'admin.roles.admins','uses'=>'AdminController@roles_admins']);

            Route::get('users/roles/',[ 'as'=>'admin.roles','uses'=>'AdminController@users_roles']);
            Route::get('users/roles/add',[ 'as'=>'admin.roles.add','uses'=>'AdminController@add_roles']);
            Route::post('users/roles/add',[ 'as'=>'admin.roles.save','uses'=>'AdminController@add_roles_save']);

            Route::post('users/roles/add_roles/',[ 'as'=>'admin.add_roles','uses'=>'AdminController@add_roles_to_user']);

            Route::delete('/users/delete/{id}',[ 'as'=>'admin.users.delete','uses'=>'AdminController@delete_users']);
            Route::get('users/profile/',[ 'as'=>'admin.users.profile','uses'=>'AdminController@profile_users']);
            Route::post('users/profile/',[ 'as'=>'admin.users.profile.store','uses'=>'AdminController@profile_users_save']);

            Route::get('users/settings/',[ 'as'=>'admin.settings','uses'=>'AdminController@profile']);
            Route::post('users/settings/',[ 'as'=>'admin.settings.save','uses'=>'AdminController@chnage_password']);

            Route::post('users/settings/avatar',[ 'as'=>'admin.settings.avatar','uses'=>'AdminController@chnage_avatar']);

            Route::get('users/settings/relogin',[ 'as'=>'admin.user.relogin','uses'=>'Auth\AdminLoginController@relogin']);

            /***** site settings*****************************************************************/

            Route::get('ciprsem/settings',['as'=>'admin.ciprsem.settings','uses'=>'CiprsemController@index']);
            Route::post('ciprsem/settings',['as'=>'admin.ciprsem.store','uses'=>'CiprsemController@store_index']);
            Route::delete('ciprsem/settings/delete/{id}',['as'=>'admin.ciprsem.delete','uses'=>'CiprsemController@delete_index']);

            Route::get('ciprsem/settings/news',['as'=>'admin.ciprsem.settings.news','uses'=>'CiprsemController@news']);
            Route::post('ciprsem/settings/news',['as'=>'admin.ciprsem.store.news','uses'=>'CiprsemController@news_store']);
            Route::delete('ciprsem/settings/news/delete/{id}',['uses'=>'CiprsemController@delete_news']);

            Route::get('ciprsem/settings/activities',['as'=>'admin.ciprsem.settings.activities','uses'=>'CiprsemController@activities']);
            Route::post('ciprsem/settings/activities',['as'=>'admin.ciprsem.store.activities','uses'=>'CiprsemController@activities_store']);
            Route::delete('ciprsem/settings/activities/delete/{id}',['uses'=>'CiprsemController@delete_activities']);

            Route::get('ciprsem/settings/picturs',['as'=>'admin.ciprsem.settings.picturs','uses'=>'CiprsemController@picturs']);
            Route::post('ciprsem/settings/picturs',['as'=>'admin.ciprsem.store.picturs','uses'=>'CiprsemController@picturs_store']);
            Route::delete('ciprsem/settings/picturs/delete/{id}',['uses'=>'CiprsemController@delete_picturs']);

            Route::get('ciprsem/settings/videos',['as'=>'admin.ciprsem.settings.videos','uses'=>'CiprsemController@videos']);
            Route::post('ciprsem/settings/videos',['as'=>'admin.ciprsem.store.videos','uses'=>'CiprsemController@videos_store']);
            Route::delete('ciprsem/settings/videos/delete/{id}',['uses'=>'CiprsemController@delete_videos']);

            Route::get('ciprsem/system/controller',['as'=>'admin.system.control','uses'=>'CiprsemController@controller']);
            Route::post('ciprsem/system/controller',['as'=>'admin.system.control.boot','uses'=>'CiprsemController@On_Off']);

            /*** Password reset for Admin *******************************************************/

            Route::get('/password/reset',

                [   'as'=>'admin.password.request',
                    'uses'=>'Auth\AdminForgotPasswordController@showLinkRequestForm'
                ]);

            Route::post('/password/email',

                [   'as'=>'admin.password.email',
                    'uses'=>'Auth\AdminForgotPasswordController@sendResetLinkEmail'
                ]);

            Route::get('/password/reset/{token}',

                [   'as'=>'admin.password.reset',
                    'uses'=>'Auth\AdminResetPasswordController@showResetForm'
                ]);

            Route::post('/password/reset',

                [   'as'=>'admin.password.change',
                    'uses'=>'Auth\AdminResetPasswordController@reset'
                ]);
        });
    });

