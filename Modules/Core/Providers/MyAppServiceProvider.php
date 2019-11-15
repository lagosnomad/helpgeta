<?php namespace Modules\Core\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Nwidart\Modules\LaravelModulesServiceProvider;
use Nwidart\Modules\Facades\Module;

class MyAppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->register(MailServiceProvider::class);
        $this->app->register(SidebarServiceProvider::class);
    }

    public function register()
    {

        $loader = AliasLoader::getInstance();
        $loader->alias('Module', Module::class);

        $this->app->register(ConsoleServiceProvider::class);

    }
}
