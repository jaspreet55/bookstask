<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Elasticsearch\ClientBuilder;
class ElasticsearchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('elasticsearch', function ($app) {
            return ClientBuilder::create()
                ->setHosts(config('database.connections.elasticsearch.hosts'))
                ->setSSLVerification(false)
                ->build();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
