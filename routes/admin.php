<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
	Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

	//admin password reset routes
    Route::post('/password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','Admin\ResetPasswordController@reset');
    Route::get('/password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

	Route::get('/register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register')->middleware('hasInvitation');
	Route::post('/register', 'Admin\RegisterController@register')->name('admin.register.post');

    Route::group(['middleware' => ['auth:admin']], function () {

	    // Route::get('/', function () {
	    //     return view('admin.dashboard.index');
	    // })->name('admin.dashboard');
        Route::get('/dashboard', 'Admin\ProfileController@dashboard')->name('admin.dashboard');
		Route::get('/invite_list', 'Admin\InvitationController@index')->name('admin.invite');
	    Route::get('/invitation', 'Admin\InvitationController@create')->name('admin.invite.create');
		Route::post('/invitation', 'Admin\InvitationController@store')->name('admin.invitation.store');
		Route::get('/adminuser', 'Admin\AdminUserController@index')->name('admin.adminuser');
		Route::post('/adminuser', 'Admin\AdminUserController@updateAdminUser')->name('admin.adminuser.update');
	    Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
		Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');

		Route::get('/profile', 'Admin\ProfileController@index')->name('admin.profile');
		Route::post('/profile', 'Admin\ProfileController@update')->name('admin.profile.update');
		Route::post('/changepassword', 'Admin\ProfileController@changePassword')->name('admin.profile.changepassword');

        /**  user management      **/
        Route::group(['prefix'  =>   'users'], function() {
			Route::get('/', 'Admin\UserManagementController@index')->name('admin.users.index');
			Route::post('/', 'Admin\UserManagementController@updateUser')->name('admin.users.post');
			Route::get('/{id}/delete', 'Admin\UserManagementController@delete')->name('admin.users.delete');
			Route::get('/{id}/view', 'Admin\UserManagementController@viewDetail')->name('admin.users.detail');
			Route::post('updateStatus', 'Admin\UserManagementController@updateStatus')->name('admin.users.updateStatus');
			Route::get('/{id}/details', 'Admin\UserManagementController@details')->name('admin.users.details');
		});
		// Route::group(['prefix'  =>   'banner'], function() {
		// 	Route::get('/', 'Admin\BannerController@index')->name('admin.banner.index');
		// 	Route::get('/create', 'Admin\BannerController@create')->name('admin.banner.create');
		// 	Route::post('/store', 'Admin\BannerController@store')->name('admin.banner.store');
		// 	Route::get('/{id}/edit', 'Admin\BannerController@edit')->name('admin.banner.edit');
		// 	Route::post('/update', 'Admin\BannerController@update')->name('admin.banner.update');
		// 	Route::get('/{id}/delete', 'Admin\BannerController@delete')->name('admin.banner.delete');
		// 	Route::post('updateStatus', 'Admin\BannerController@updateStatus')->name('admin.banner.updateStatus');
		// });

        //**  user management  **/
		Route::group(['prefix'  =>   'user'], function() {


            Route::get('/', 'Admin\UserManagementController@index')->name('admin.user.index');
            Route::get('/create', 'Admin\UserManagementController@create')->name('admin.user.create');
            Route::post('/store', 'Admin\UserManagementController@store')->name('admin.user.store');
            Route::get('/{id}/edit', 'Admin\UserManagementController@edit')->name('admin.user.edit');
            Route::post('/update', 'Admin\UserManagementController@update')->name('admin.user.update');
            Route::get('/{id}/delete', 'Admin\UserManagementController@delete')->name('admin.user.delete');
            Route::post('updateStatus', 'Admin\UserManagementController@updateStatus')->name('admin.user.updateStatus');
            Route::get('/{id}/details', 'Admin\UserManagementController@details')->name('admin.user.details');
            Route::post('/csv-store', 'Admin\UserManagementController@csvStore')->name('admin.user.data.csv.store');
        });
       //**  project management  **/
		Route::group(['prefix'  =>   'project'], function() {


        Route::get('/', 'Admin\ProjectManagementController@index')->name('admin.project.index');
        Route::get('/create', 'Admin\ProjectManagementController@create')->name('admin.project.create');
        Route::post('/store', 'Admin\ProjectManagementController@store')->name('admin.project.store');
        Route::get('/{id}/edit', 'Admin\ProjectManagementController@edit')->name('admin.project.edit');
        Route::post('/update', 'Admin\ProjectManagementController@update')->name('admin.project.update');
        Route::get('/{id}/delete', 'Admin\ProjectManagementController@delete')->name('admin.project.delete');
        Route::post('updateStatus', 'Admin\ProjectManagementController@updateStatus')->name('admin.project.updateStatus');
        Route::get('/{id}/details', 'Admin\ProjectManagementController@details')->name('admin.project.details');
        Route::post('/csv-store', 'Admin\ProjectManagementController@csvStore')->name('admin.project.data.csv.store');
    });
    //**  Pin code management   **/
    Route::group(['prefix'  =>   'lead'], function() {
        Route::get('/', 'Admin\LeadManagementController@index')->name('admin.lead.index');
        Route::get('/create', 'Admin\LeadManagementController@create')->name('admin.lead.create');
        Route::post('/store', 'Admin\LeadManagementController@store')->name('admin.lead.store');
        Route::get('/{id}/edit', 'Admin\LeadManagementController@edit')->name('admin.lead.edit');
        Route::post('/update', 'Admin\LeadManagementController@update')->name('admin.lead.update');
        Route::get('/{id}/delete', 'Admin\LeadManagementController@delete')->name('admin.lead.delete');
        Route::post('updateStatus', 'Admin\LeadManagementController@updateStatus')->name('admin.lead.updateStatus');
        Route::get('/{id}/details', 'Admin\LeadManagementController@details')->name('admin.lead.details');
        Route::post('/csv-store', 'Admin\LeadManagementController@csvStore')->name('admin.lead.data.csv.store');
        Route::get('/export', 'Admin\LeadManagementController@export')->name('admin.lead.data.csv.export');
      });
        //**  Lead feedback management   **/


        Route::group(['prefix'  =>   'leadfeedback'], function() {

        Route::get('/', 'Admin\LeadFeedbackManagementController@index')->name('admin.leadfeedback.index');
        Route::get('/create', 'Admin\LeadFeedbackManagementController@create')->name('admin.leadfeedback.create');
        Route::post('/store', 'Admin\LeadFeedbackManagementController@store')->name('admin.leadfeedback.store');
        Route::get('/{id}/edit', 'Admin\LeadFeedbackManagementController@edit')->name('admin.leadfeedback.edit');
        Route::post('/update', 'Admin\LeadFeedbackManagementController@update')->name('admin.leadfeedback.update');
        Route::get('/{id}/delete', 'Admin\LeadFeedbackManagementController@delete')->name('admin.leadfeedback.delete');
        Route::post('updateStatus', 'Admin\LeadFeedbackManagementController@updateStatus')->name('admin.leadfeedback.updateStatus');
        Route::get('/{id}/details', 'Admin\LeadFeedbackManagementController@details')->name('admin.leadfeedback.details');
        Route::post('/csv-store', 'Admin\LeadFeedbackManagementController@csvStore')->name('admin.leadfeedback.data.csv.store');
    });
        //**  Lead User management   **/
		Route::group(['prefix'  =>   'leaduser'], function() {



        Route::get('/', 'Admin\LeadUserManagementController@index')->name('admin.leaduser.index');
        Route::get('/create', 'Admin\LeadUserManagementController@create')->name('admin.leaduser.create');
        Route::post('/store', 'Admin\LeadUserManagementController@store')->name('admin.leaduser.store');
        Route::get('/{id}/edit', 'Admin\LeadUserManagementController@edit')->name('admin.leaduser.edit');
        Route::post('/update', 'Admin\LeadUserManagementController@update')->name('admin.leaduser.update');
        Route::get('/{id}/delete', 'Admin\LeadUserManagementController@delete')->name('admin.leaduser.delete');
        Route::post('updateStatus', 'Admin\LeadUserManagementController@updateStatus')->name('admin.leaduser.updateStatus');
        Route::get('/{id}/details', 'Admin\LeadUserManagementController@details')->name('admin.leaduser.details');
        Route::post('/csv-store', 'Admin\LeadUserManagementController@csvStore')->name('admin.leaduser.data.csv.store');
        Route::get('/export', 'Admin\LeadUserManagementController@export')->name('admin.leaduser.data.csv.export');
    });

        //**  Certificate management   **/
		Route::group(['prefix'  =>   'certificate'], function() {



            Route::get('/', 'Admin\CertificateManagementController@index')->name('admin.certificate.index');
            Route::get('/create', 'Admin\CertificateManagementController@create')->name('admin.certificate.create');
            Route::post('/store', 'Admin\CertificateManagementController@store')->name('admin.certificate.store');
            Route::get('/{id}/edit', 'Admin\CertificateManagementController@edit')->name('admin.certificate.edit');
            Route::post('/update', 'Admin\CertificateManagementController@update')->name('admin.certificate.update');
            Route::get('/{id}/delete', 'Admin\CertificateManagementController@delete')->name('admin.certificate.delete');
            Route::post('updateStatus', 'Admin\CertificateManagementController@updateStatus')->name('admin.certificate.updateStatus');
            Route::get('/{id}/details', 'Admin\CertificateManagementController@details')->name('admin.certificate.details');
            Route::post('/csv-store', 'Admin\CertificateManagementController@csvStore')->name('admin.certificate.data.csv.store');
            Route::get('/export', 'Admin\CertificateManagementController@export')->name('admin.certificate.data.csv.export');
        });
    //     //**  Sub category management  **/
	// 	Route::group(['prefix'  =>   'subcategory'], function() {



    //     Route::get('/', 'Admin\SubCategoryManagementController@index')->name('admin.subcategory.index');
    //     Route::get('/create', 'Admin\SubCategoryManagementController@create')->name('admin.subcategory.create');
    //     Route::post('/store', 'Admin\SubCategoryManagementController@store')->name('admin.subcategory.store');
    //     Route::get('/{id}/edit', 'Admin\SubCategoryManagementController@edit')->name('admin.subcategory.edit');
    //     Route::post('/update', 'Admin\SubCategoryManagementController@update')->name('admin.subcategory.update');
    //     Route::get('/{id}/delete', 'Admin\SubCategoryManagementController@delete')->name('admin.subcategory.delete');
    //     Route::post('updateStatus', 'Admin\SubCategoryManagementController@updateStatus')->name('admin.subcategory.updateStatus');
    //     Route::get('/{id}/details', 'Admin\SubCategoryManagementController@details')->name('admin.subcategory.details');
    //     Route::post('/csv-store', 'Admin\SubCategoryManagementController@csvStore')->name('admin.subcategory.data.csv.store');
    // });
    //     //**  Sub category level2 management  **/
	// 	Route::group(['prefix'  =>   'sub-category-level2'], function() {


    //     Route::get('/', 'Admin\SubCategoryLevelController@index')->name('admin.sub-category-level2.index');
    //     Route::get('/create', 'Admin\SubCategoryLevelController@create')->name('admin.sub-category-level2.create');
    //     Route::post('/store', 'Admin\SubCategoryLevelController@store')->name('admin.sub-category-level2.store');
    //     Route::get('/{id}/edit', 'Admin\SubCategoryLevelController@edit')->name('admin.sub-category-level2.edit');
    //     Route::post('/update', 'Admin\SubCategoryLevelController@update')->name('admin.sub-category-level2.update');
    //     Route::get('/{id}/delete', 'Admin\SubCategoryLevelController@delete')->name('admin.sub-category-level2.delete');
    //     Route::post('updateStatus', 'Admin\SubCategoryLevelController@updateStatus')->name('admin.sub-category-level2.updateStatus');
    //     Route::get('/{id}/details', 'Admin\SubCategoryLevelController@details')->name('admin.sub-category-level2.details');
    //     Route::post('/csv-store', 'Admin\SubCategoryLevelController@csvStore')->name('admin.sub-category-level2.data.csv.store');
    // });



    //  //**  blog management  **/
	// 	Route::group(['prefix'  =>   'blog'], function() {


    //         Route::get('/', 'Admin\BlogController@index')->name('admin.blog.index');
    //         Route::get('/create', 'Admin\BlogController@create')->name('admin.blog.create');
    //         Route::post('/store', 'Admin\BlogController@store')->name('admin.blog.store');
    //         Route::get('/{id}/edit', 'Admin\BlogController@edit')->name('admin.blog.edit');
    //         Route::post('/update', 'Admin\BlogController@update')->name('admin.blog.update');
    //         Route::get('/{id}/delete', 'Admin\BlogController@delete')->name('admin.blog.delete');
    //         Route::post('updateStatus', 'Admin\BlogController@updateStatus')->name('admin.blog.updateStatus');
    //         Route::get('/{id}/details', 'Admin\BlogController@details')->name('admin.blog.details');
    //         Route::post('/csv-store', 'Admin\BlogController@csvStore')->name('admin.blog.data.csv.store');
    //         Route::get('/export', 'Admin\BlogController@export')->name('admin.blog.data.csv.export');
    //     });

    //  //**  Directory management  **/
	// 	Route::group(['prefix'  =>   'directory'], function() {


    //         Route::get('/', 'Admin\DirectoryController@index')->name('admin.directory.index');
    //         Route::get('/create', 'Admin\DirectoryController@create')->name('admin.directory.create');
    //         Route::post('/store', 'Admin\DirectoryController@store')->name('admin.directory.store');
    //         Route::get('/{id}/edit', 'Admin\DirectoryController@edit')->name('admin.directory.edit');
    //         Route::post('/update', 'Admin\DirectoryController@update')->name('admin.directory.update');
    //         Route::get('/{id}/delete', 'Admin\DirectoryController@delete')->name('admin.directory.delete');
    //         Route::post('updateStatus', 'Admin\DirectoryController@updateStatus')->name('admin.directory.updateStatus');
    //         Route::get('/{id}/details', 'Admin\DirectoryController@details')->name('admin.directory.details');
    //         Route::post('/csv-store', 'Admin\DirectoryController@csvStore')->name('admin.directory.data.csv.store');
    //         Route::get('/export', 'Admin\DirectoryController@export')->name('admin.directory.data.csv.export');
    //     });

    //     //**  Collection management  **/
	// 	Route::group(['prefix'  =>   'collection'], function() {


    //         Route::get('/', 'Admin\CollectionController@index')->name('admin.collection.index');
    //         Route::get('/create', 'Admin\CollectionController@create')->name('admin.collection.create');
    //         Route::post('/store', 'Admin\CollectionController@store')->name('admin.collection.store');
    //         Route::get('/{id}/edit', 'Admin\CollectionController@edit')->name('admin.collection.edit');
    //         Route::post('/update', 'Admin\CollectionController@update')->name('admin.collection.update');
    //         Route::get('/{id}/delete', 'Admin\CollectionController@delete')->name('admin.collection.delete');
    //         Route::post('updateStatus', 'Admin\CollectionController@updateStatus')->name('admin.collection.updateStatus');
    //         Route::get('/{id}/details', 'Admin\CollectionController@details')->name('admin.collection.details');
    //         Route::post('/csv-store', 'Admin\CollectionController@csvStore')->name('admin.collection.data.csv.store');
    //         Route::get('/export', 'Admin\CollectionController@export')->name('admin.collection.data.csv.export');
    //     });



    //     //**  Directory-Collection management  **/
	// 	Route::group(['prefix'  =>   'collectiondir'], function() {


    //         Route::get('/', 'Admin\DirectoryCollectionController@index')->name('admin.collectiondir.index');
    //         Route::get('/create', 'Admin\DirectoryCollectionController@create')->name('admin.collectiondir.create');
    //         Route::post('/store', 'Admin\DirectoryCollectionController@store')->name('admin.collectiondir.store');
    //         Route::get('/{id}/edit', 'Admin\DirectoryCollectionController@edit')->name('admin.collectiondir.edit');
    //         Route::post('/update', 'Admin\DirectoryCollectionController@update')->name('admin.collectiondir.update');
    //         Route::get('/{id}/delete', 'Admin\DirectoryCollectionController@delete')->name('admin.collectiondir.delete');
    //         Route::post('updateStatus', 'Admin\DirectoryCollectionController@updateStatus')->name('admin.collectiondir.updateStatus');
    //         Route::get('/{id}/details', 'Admin\DirectoryCollectionController@details')->name('admin.collectiondir.details');
    //         Route::post('/csv-store', 'Admin\DirectoryCollectionController@csvStore')->name('admin.collectiondir.data.csv.store');
    //     });



    //     //**  Directory-Collection management  **/
	// 	Route::group(['prefix'  =>   'dircategory'], function() {


    //         Route::get('/', 'Admin\DirectoryCategoryController@index')->name('admin.dircategory.index');
    //         Route::get('/create', 'Admin\DirectoryCategoryController@create')->name('admin.dircategory.create');
    //         Route::post('/store', 'Admin\DirectoryCategoryController@store')->name('admin.dircategory.store');
    //         Route::get('/{id}/edit', 'Admin\DirectoryCategoryController@edit')->name('admin.dircategory.edit');
    //         Route::post('/update', 'Admin\DirectoryCategoryController@update')->name('admin.dircategory.update');
    //         Route::get('/{id}/delete', 'Admin\DirectoryCategoryController@delete')->name('admin.dircategory.delete');
    //         Route::post('updateStatus', 'Admin\DirectoryCategoryController@updateStatus')->name('admin.dircategory.updateStatus');
    //         Route::get('/{id}/details', 'Admin\DirectoryCategoryController@details')->name('admin.dircategory.details');
    //         Route::post('/csv-store', 'Admin\DirectoryCategoryController@csvStore')->name('admin.dircategory.data.csv.store');
    //     });


    //      //**  Bussiness Lead management  **/
	// 	Route::group(['prefix'  =>   'bussinesslead'], function() {


    //         Route::get('/', 'Admin\BussinessLeadController@index')->name('admin.bussinesslead.index');
    //         Route::get('/create', 'Admin\BussinessLeadController@create')->name('admin.bussinesslead.create');
    //         Route::post('/store', 'Admin\BussinessLeadController@store')->name('admin.bussinesslead.store');
    //         Route::get('/{id}/edit', 'Admin\BussinessLeadController@edit')->name('admin.bussinesslead.edit');
    //         Route::post('/update', 'Admin\BussinessLeadController@update')->name('admin.bussinesslead.update');
    //         Route::get('/{id}/delete', 'Admin\BussinessLeadController@delete')->name('admin.bussinesslead.delete');
    //         Route::post('updateStatus', 'Admin\BussinessLeadController@updateStatus')->name('admin.bussinesslead.updateStatus');
    //         Route::get('/{id}/details', 'Admin\BussinessLeadController@details')->name('admin.bussinesslead.details');
    //         Route::post('/csv-store', 'Admin\BussinessLeadController@csvStore')->name('admin.bussinesslead.data.csv.store');
    //         Route::get('/export', 'Admin\BussinessLeadController@export')->name('admin.bussinesslead.data.csv.export');
    //     });
	// 	// Route::group(['prefix'  =>   'business'], function() {
	// 	// 	Route::get('/', 'Admin\BusinessController@index')->name('admin.business.index');
	// 	// 	Route::get('/create', 'Admin\BusinessController@create')->name('admin.business.create');
	// 	// 	Route::post('/store', 'Admin\BusinessController@store')->name('admin.business.store');
	// 	// 	Route::get('/{id}/edit', 'Admin\BusinessController@edit')->name('admin.business.edit');
	// 	// 	Route::post('/update', 'Admin\BusinessController@update')->name('admin.business.update');
	// 	// 	Route::get('/{id}/delete', 'Admin\BusinessController@delete')->name('admin.business.delete');
	// 	// 	Route::post('updateStatus', 'Admin\BusinessController@updateStatus')->name('admin.business.updateStatus');
	// 	// 	Route::get('/{id}/details', 'Admin\BusinessController@details')->name('admin.business.details');
	// 	// });

	// 	// Route::group(['prefix'  =>   'category'], function() {
	// 	// 	Route::get('/', 'Admin\CategoryController@index')->name('admin.category.index');
	// 	// 	Route::get('/create', 'Admin\CategoryController@create')->name('admin.category.create');
	// 	// 	Route::post('/store', 'Admin\CategoryController@store')->name('admin.category.store');
	// 	// 	Route::get('/{id}/edit', 'Admin\CategoryController@edit')->name('admin.category.edit');
	// 	// 	Route::post('/update', 'Admin\CategoryController@update')->name('admin.category.update');
	// 	// 	Route::get('/{id}/delete', 'Admin\CategoryController@delete')->name('admin.category.delete');
	// 	// 	Route::post('updateStatus', 'Admin\CategoryController@updateStatus')->name('admin.category.updateStatus');
	// 	// 	Route::get('/{id}/details', 'Admin\CategoryController@details')->name('admin.category.details');
	// 	// });

	// 	// Route::group(['prefix'  =>   'event'], function() {
	// 	// 	Route::get('/', 'Admin\EventController@index')->name('admin.event.index');
	// 	// 	Route::get('/create', 'Admin\EventController@create')->name('admin.event.create');
	// 	// 	Route::post('/store', 'Admin\EventController@store')->name('admin.event.store');
	// 	// 	Route::get('/{id}/edit', 'Admin\EventController@edit')->name('admin.event.edit');
	// 	// 	Route::post('/update', 'Admin\EventController@update')->name('admin.event.update');
	// 	// 	Route::get('/{id}/delete', 'Admin\EventController@delete')->name('admin.event.delete');
	// 	// 	Route::post('updateStatus', 'Admin\EventController@updateStatus')->name('admin.event.updateStatus');
	// 	// 	Route::get('/{id}/details', 'Admin\EventController@details')->name('admin.event.details');
	// 	// });

	// 	// Route::group(['prefix'  =>   'deal'], function() {
	// 	// 	Route::get('/', 'Admin\DealController@index')->name('admin.deal.index');
	// 	// 	Route::get('/create', 'Admin\DealController@create')->name('admin.deal.create');
	// 	// 	Route::post('/store', 'Admin\DealController@store')->name('admin.deal.store');
	// 	// 	Route::get('/{id}/edit', 'Admin\DealController@edit')->name('admin.deal.edit');
	// 	// 	Route::post('/update', 'Admin\DealController@update')->name('admin.deal.update');
	// 	// 	Route::get('/{id}/delete', 'Admin\DealController@delete')->name('admin.deal.delete');
	// 	// 	Route::post('updateStatus', 'Admin\DealController@updateStatus')->name('admin.deal.updateStatus');
	// 	// 	Route::get('/{id}/details', 'Admin\DealController@details')->name('admin.deal.details');
	// 	// });

	// 	// Route::group(['prefix'  =>   'property'], function() {
	// 	// 	Route::get('/', 'Admin\PropertyController@index')->name('admin.property.index');
	// 	// 	Route::get('/create', 'Admin\PropertyController@create')->name('admin.property.create');
	// 	// 	Route::post('/store', 'Admin\PropertyController@store')->name('admin.property.store');
	// 	// 	Route::get('/{id}/edit', 'Admin\PropertyController@edit')->name('admin.property.edit');
	// 	// 	Route::post('/update', 'Admin\PropertyController@update')->name('admin.property.update');
	// 	// 	Route::get('/{id}/delete', 'Admin\PropertyController@delete')->name('admin.property.delete');
	// 	// 	Route::post('updateStatus', 'Admin\PropertyController@updateStatus')->name('admin.property.updateStatus');
	// 	// 	Route::get('/{id}/details', 'Admin\PropertyController@details')->name('admin.property.details');
	// 	// });

	// 	// Route::group(['prefix'  =>   'blog'], function() {
	// 	// 	Route::get('/', 'Admin\BlogController@index')->name('admin.blog.index');
	// 	// 	Route::get('/create', 'Admin\BlogController@create')->name('admin.blog.create');
	// 	// 	Route::post('/store', 'Admin\BlogController@store')->name('admin.blog.store');
	// 	// 	Route::get('/{id}/edit', 'Admin\BlogController@edit')->name('admin.blog.edit');
	// 	// 	Route::post('/update', 'Admin\BlogController@update')->name('admin.blog.update');
	// 	// 	Route::get('/{id}/delete', 'Admin\BlogController@delete')->name('admin.blog.delete');
	// 	// 	Route::post('updateStatus', 'Admin\BlogController@updateStatus')->name('admin.blog.updateStatus');
	// 	// 	Route::get('/{id}/details', 'Admin\BlogController@details')->name('admin.blog.details');
	// 	// });

	// 	// Route::group(['prefix'  =>   'notification'], function() {
	// 	// 	Route::get('/', 'Admin\NotificationController@index')->name('admin.notification.index');
	// 	// 	Route::get('/create', 'Admin\NotificationController@create')->name('admin.notification.create');
	// 	// 	Route::post('/store', 'Admin\NotificationController@store')->name('admin.notification.store');
	// 	// 	Route::get('/{id}/delete', 'Admin\NotificationController@delete')->name('admin.notification.delete');

	// 	// });

	// 	// Route::group(['prefix'  =>   'loop'], function() {
	// 	// 	Route::get('/', 'Admin\LoopController@index')->name('admin.loop.index');
	// 	// 	Route::get('/{id}/delete', 'Admin\LoopController@delete')->name('admin.loop.delete');
	// 	// 	Route::post('updateStatus', 'Admin\LoopController@updateStatus')->name('admin.loop.updateStatus');
	// 	// 	Route::get('/{id}/details', 'Admin\LoopController@details')->name('admin.loop.details');
	// 	// });

	});

});
?>
