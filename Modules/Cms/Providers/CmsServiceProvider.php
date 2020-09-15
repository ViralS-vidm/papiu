<?php

namespace Modules\Cms\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\Cms\Repositories\ConfigCmsRepository;
use Modules\Cms\Repositories\Contracts\ConfigCmsRepositoryInterface;
use Modules\Cms\Repositories\Contracts\ImageCmsRepositoryInterface;
use Modules\Cms\Repositories\Contracts\VideoCmsRepositoryInterface;
use Modules\Cms\Repositories\ImageCmsRepository;
use Modules\Cms\Repositories\Contracts\MetaCmsRepositoryInterface;
use Modules\Cms\Repositories\MetaCmsRepository;
use Modules\Cms\Repositories\VideoCmsRepository;
use Modules\Cms\Services\ConfigCmsService;
use Modules\Cms\Services\Contracts\ConfigCmsServiceInterface;
use Modules\Cms\Services\Contracts\ImageCmsServiceInterface;
use Modules\Cms\Services\Contracts\VideoCmsServiceInterface;
use Modules\Cms\Services\ImageCmsService;
use Modules\Cms\Services\VideoCmsService;

class CmsServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Cms';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'cms';

    /**
     * [abstract => concrete]
     */
    public $bindings = [
        ImageCmsRepositoryInterface::class => ImageCmsRepository::class,
        ConfigCmsRepositoryInterface::class => ConfigCmsRepository::class,
        ImageCmsServiceInterface::class => ImageCmsService::class,
        MetaCmsRepositoryInterface::class => MetaCmsRepository::class,
        ConfigCmsServiceInterface::class => ConfigCmsService::class,
        VideoCmsRepositoryInterface::class => VideoCmsRepository::class,
        VideoCmsServiceInterface::class => VideoCmsService::class,
    ];

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
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (!app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path($this->moduleName, 'Database/factories'));
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

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }
}
