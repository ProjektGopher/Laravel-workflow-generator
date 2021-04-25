<?php

namespace ProjektGopher\WorkflowGenerator\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use ProjektGopher\WorkflowGenerator\WorkflowGeneratorServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            WorkflowGeneratorServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
    }
}
