<?php

namespace Crawler;

use Illuminate\Support\ServiceProvider;
use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;

use URL, Route;
use Illuminate\Http\Request;


class CrawlerServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request) {
        /**
         * Publish
         */
         $this->publishes([
            __DIR__.'/config/crawler_admin.php' => config_path('crawler_admin.php'),
        ],'config');

        $this->loadViewsFrom(__DIR__ . '/views', 'crawler');


        /**
         * Translations
         */
         $this->loadTranslationsFrom(__DIR__.'/lang', 'crawler');


        /**
         * Load view composer
         */
        $this->crawlerViewComposer($request);

         $this->publishes([
                __DIR__.'/../database/migrations/' => database_path('migrations')
            ], 'migrations');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        include __DIR__ . '/routes.php';

        /**
         * Load controllers
         */
        $this->app->make('Crawler\Controllers\Admin\CrawlerAdminController');

         /**
         * Load Views
         */
        $this->loadViewsFrom(__DIR__ . '/views', 'crawler');
    }

    /**
     *
     */
    public function crawlerViewComposer(Request $request) {

        view()->composer('crawler::crawler*', function ($view) {
            global $request;
            $crawler_id = $request->get('id');
            $is_action = empty($crawler_id)?'page_add':'page_edit';

            $view->with('sidebar_items', [

                /**
                 * crawlers
                 */
                //list
                trans('crawler::crawler_admin.page_list') => [
                    'url' => URL::route('admin_crawler'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],
                //add
                trans('crawler::crawler_admin.'.$is_action) => [
                    'url' => URL::route('admin_crawler.edit'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],

                /**
                 * Categories
                 */
                //list
                trans('crawler::crawler_admin.page_category_list') => [
                    'url' => URL::route('admin_crawler_category'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],
            ]);
            //
        });
    }

}
