<?php

namespace King\Frontend\Providers;

use Illuminate\Support\ServiceProvider;

class FrontendServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->_loadHelpers();
        $this->_loadConfig();
        $this->_loadRoutes();
        $this->_loadTranslations();
        $this->_loadViews();
        $this->_publishAssets();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
    
    private function _loadConfig()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/frontend.php', 'frontend');
    }
    
    private function _loadRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
    }
    
    private function _loadTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'frontend');
    }
    
    private function _loadViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'frontend');
    }
    
    private function _loadHelpers() 
    {
        require_once __DIR__ . '/../Helpers/functions.php';
    }
    
    private function _publishAssets()
    {
        $this->publishes([
            __DIR__ . '/../../resources/assets' => public_path('vendor/king/frontend')
        ], 'public');
    }
}
