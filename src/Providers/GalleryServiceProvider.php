<?php

namespace Litecms\Gallery\Providers;

use Illuminate\Support\ServiceProvider;

class GalleryServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Load view
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'gallery');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'gallery');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        // Call pblish redources function
        $this->publishResources();

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'litecms.gallery');

        // Bind facade
        $this->app->bind('litecms.gallery', function ($app) {
            return $this->app->make('Litecms\Gallery\Gallery');
        });

        // Bind Gallery to repository
        $this->app->bind(
            'Litecms\Gallery\Interfaces\GalleryRepositoryInterface',
            \Litecms\Gallery\Repositories\Eloquent\GalleryRepository::class
        );

        $this->app->register(\Litecms\Gallery\Providers\AuthServiceProvider::class);

        $this->app->register(\Litecms\Gallery\Providers\RouteServiceProvider::class);

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['litecms.gallery'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../config/config.php' => config_path('litecms/gallery.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../resources/views' => base_path('resources/views/vendor/gallery')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/gallery')], 'lang');

         // Publish storage files
        $this->publishes([__DIR__ . '/../../storage' => base_path('storage')], 'storage');

        // Publish public files and assets.
        $this->publishes([__DIR__ . '/public/' => public_path('/')], 'public');
    }
}
