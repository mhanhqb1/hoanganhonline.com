<?php

namespace Botble\Language\Providers;

use Botble\Language\Commands\RouteTranslationsCacheCommand;
use Botble\Language\Commands\RouteTranslationsClearCommand;
use Botble\Language\Commands\RouteTranslationsListCommand;
use Botble\Language\Commands\SyncOldDataCommand;
use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                SyncOldDataCommand::class,
                RouteTranslationsClearCommand::class,
                RouteTranslationsListCommand::class,
                RouteTranslationsCacheCommand::class,
            ]);
        }
    }
}
