<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('crawler', [
    'as' => 'crawler',
    'uses' => 'Crawler\Controllers\Admin\CrawlerFrontController@index'
]);


/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see']], function () {

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////crawlerS ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        /**
         * list
         */
        Route::get('admin/crawler', [
            'as' => 'admin_crawler',
            'uses' => 'Crawler\Controllers\Admin\CrawlerAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/crawler/edit', [
            'as' => 'admin_crawler.edit',
            'uses' => 'Crawler\Controllers\Admin\CrawlerAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/crawler/edit', [
            'as' => 'admin_crawler.post',
            'uses' => 'Crawler\Controllers\Admin\CrawlerAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/crawler/delete', [
            'as' => 'admin_crawler.delete',
            'uses' => 'Crawler\Controllers\Admin\CrawlerAdminController@delete'
        ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////crawlerS ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////




        
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
         Route::get('admin/crawler_category', [
            'as' => 'admin_crawler_category',
            'uses' => 'Crawler\Controllers\Admin\CrawlerCategoryAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/crawler_category/edit', [
            'as' => 'admin_crawler_category.edit',
            'uses' => 'Crawler\Controllers\Admin\CrawlerCategoryAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/crawler_category/edit', [
            'as' => 'admin_crawler_category.post',
            'uses' => 'Crawler\Controllers\Admin\CrawlerCategoryAdminController@post'
        ]);
         /**
         * delete
         */
        Route::get('admin/crawler_category/delete', [
            'as' => 'admin_crawler_category.delete',
            'uses' => 'Crawler\Controllers\Admin\CrawlerCategoryAdminController@delete'
        ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////

        Route::get('admin/getData', [
            'as' => 'admin_crawler_getdata',
            'uses' => 'Crawler\Controllers\Admin\CrawlerController@index'
        ]);
    });
});
