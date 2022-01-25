<?php

namespace io3x1\FilamentExcel;

use Illuminate\Support\ServiceProvider;
use Filament\PluginServiceProvider;
use Filament\Navigation\NavigationItem;
use Filament\Facades\Filament;
use io3x1\FilamentExcel\Commands\ExcelGenerator;
use Spatie\LaravelPackageTools\Package;


class FilamentExcelProvider extends PluginServiceProvider
{
    public static string $name = 'filament-excel';

    public function configurePackage(Package $package): void
    {
        $package->name('filament-excel');
    }

    public function boot(): void
    {

        if ($this->app->runningInConsole()) {
            $this->commands([
                ExcelGenerator::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../templates', 'filament-excel-templates');
    }
}
