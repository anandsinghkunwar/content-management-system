<?php

namespace App\Providers\SC\Domain;

use Illuminate\Support\ServiceProvider;

class ArticleDomainServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Contracts\Domain\IArticleDomainContract','App\Services\Domain\ArticleDomainService');

    }
}