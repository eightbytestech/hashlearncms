<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Content Categories
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tags
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Pages
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::resource('content-pages', 'ContentPageController');

    // Course Categories
    Route::delete('course-categories/destroy', 'CourseCategoryController@massDestroy')->name('course-categories.massDestroy');
    Route::resource('course-categories', 'CourseCategoryController');

    // Course Subjects
    Route::delete('course-subjects/destroy', 'CourseSubjectController@massDestroy')->name('course-subjects.massDestroy');
    Route::resource('course-subjects', 'CourseSubjectController');

    // Course Chapters
    Route::delete('course-chapters/destroy', 'CourseChapterController@massDestroy')->name('course-chapters.massDestroy');
    Route::resource('course-chapters', 'CourseChapterController');

    // Course Chapter Groups
    Route::delete('course-chapter-groups/destroy', 'CourseChapterGroupController@massDestroy')->name('course-chapter-groups.massDestroy');
    Route::resource('course-chapter-groups', 'CourseChapterGroupController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
