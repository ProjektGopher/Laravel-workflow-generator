<?php

namespace ProjektGopher\WorkflowGenerator;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ProjektGopher\WorkflowGenerator\WorkflowGenerator
 */
class WorkflowGeneratorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel_workflow_generator';
    }
}
