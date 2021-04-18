<?php

namespace Projektgopher\WorkflowGenerator\Commands;

use Illuminate\Console\Command;

class WorkflowListCommand extends Command
{
    public $signature = 'workflow:list';

    public $description = 'List all currently available workflows';

    public function handle()
    {
        $this->comment('List all workflows');
    }
}
