<?php

namespace WooSales\Report;

use Illuminate\Support\ServiceProvider;

class WooSalesReportServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/woo-sales-report.php', 'woo-sales-report'
        );
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'woo-sales-report');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        $this->publishes([
            __DIR__.'/../config/woo-sales-report.php' => config_path('woo-sales-report.php'),
            __DIR__.'/views' => resource_path('views/vendor/woo-sales-report'),
        ], 'woo-sales-report');
    }
} 