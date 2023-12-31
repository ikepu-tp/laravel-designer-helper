<?php

namespace ikepu_tp\DesignerHelper;

use ikepu_tp\DesignerHelper\app\Models\Project;
use ikepu_tp\DesignerHelper\app\Observers\ProjectObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class DesignerHelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/config/designer.php', 'designer');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Project::observe(ProjectObserver::class);

        $this->registerPublishing();
        $this->defineRoutes();
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadViewsFrom(__DIR__ . "/resources/views", "DesignerHelper");
        //Blade::componentNamespace("ikepu_tp\\resources\\views\\components", "DesignerHelper");
    }

    /**
     * Register the package's publishable resources.
     */
    private function registerPublishing()
    {
        if (!$this->app->runningInConsole()) return;

        $this->publishes([
            __DIR__ . '/config/designer.php' => base_path('config/designer.php'),
        ], 'DesignerHelper-config');


        $this->publishTests();
        //$this->publishMigration();
        //$this->publishView();
        //$this->publishAsset();
    }

    private function publishMigration(): void
    {
        $migrations = [];
        foreach ($migrations as $migration) {
            $this->publishes([
                __DIR__ . "/database/migrations/{$migration}" => database_path(
                    "migrations/{$migration}"
                ),
            ], 'migrations');
        }
    }

    private function publishView(): void
    {
        $this->publishes([
            __DIR__ . '/resources/views' => resource_path('views/vendor/DesignerHelper'),
        ], 'DesignerHelper-views');
    }

    private function publishTests(): void
    {
        $this->publishes([
            __DIR__ . '/tests' => base_path("tests"),
        ], 'DesignerHelper-tests');
    }

    private function publishAsset(): void
    {
        $this->publishes([], 'DesignerHelper-assets');
    }

    /**
     * Define the routes.
     *
     * @return void
     */
    protected function defineRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . "/routes/web.php");
    }
}