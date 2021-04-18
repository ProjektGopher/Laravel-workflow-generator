<?php

namespace Projektgopher\WorkflowGenerator;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Projektgopher\WorkflowGenerator\WorkflowGenerator
 */
class WorkflowGeneratorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel_workflow_generator';
    }
}
