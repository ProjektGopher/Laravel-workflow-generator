<?php

namespace Projektgopher\WorkflowGenerator;

use Projektgopher\WorkflowGenerator\Commands\ListCommand;
use Projektgopher\WorkflowGenerator\Commands\MakeCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class WorkflowGeneratorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('workflow_generator')
            ->hasConfigFile()
            ->hasCommands([
                MakeCommand::class,
                ListCommand::class,
            ]);
    }
}
