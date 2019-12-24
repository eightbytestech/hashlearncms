<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Content Categories
    Route::apiResource('content-categories', 'ContentCategoryApiController');

    // Content Tags
    Route::apiResource('content-tags', 'ContentTagApiController');

    // Content Pages
    Route::post('content-pages/media', 'ContentPageApiController@storeMedia')->name('content-pages.storeMedia');
    Route::apiResource('content-pages', 'ContentPageApiController');

    // Course Categories
    Route::apiResource('course-categories', 'CourseCategoryApiController');

    // Course Subjects
    Route::apiResource('course-subjects', 'CourseSubjectApiController');

    // Course Chapters
    Route::apiResource('course-chapters', 'CourseChapterApiController');

    // Course Chapter Groups
    Route::apiResource('course-chapter-groups', 'CourseChapterGroupApiController');
});
