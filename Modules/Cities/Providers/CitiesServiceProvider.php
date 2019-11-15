<?php

namespace Modules\Cities\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Database\Eloquent\Factory;
use Modules\Core\Observers\FileObserver;
use Modules\Core\Observers\SlugObserver;
use Modules\Cities\Entities\City;
use Modules\Cities\Repositories\EloquentCity;

class CitiesServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        AliasLoader::getInstance()->alias(
            'Cities',
            'Modules\Cities\Facades\Facade'
        );

        /*City::observe(new SlugObserver());
        City::observe(new FileObserver());*/

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        $app->bind('Modules\Cities\Repositories\CityInterface', function (Application $app) {
            $repository = new EloquentCity(new City);
            return $repository;
        });

        /*$app->view->composer('cities::public.*', function ($view) {
            $view->page = \MyApp::getPageLinkedToModule('cities');
        });*/
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('cities.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'cities'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/cities');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/cities';
        }, \Config::get('view.paths')), [$sourcePath]), 'cities');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/cities');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'cities');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'cities');
        }
    }

    /**
     * Register an additional directory of factories.
     * 
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production')) {
            app(Factory::class)->load(__DIR__ . '/../Database/factories');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
