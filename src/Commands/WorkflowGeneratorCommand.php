<?php

namespace Projektgopher\WorkflowGenerator\Commands;

use Illuminate\Console\Command;

class WorkflowGeneratorCommand extends Command
{
    public $signature = 'laravel_workflow_generator';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
