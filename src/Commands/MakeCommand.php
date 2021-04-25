<?php

namespace Projektgopher\WorkflowGenerator\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeCommand extends Command
{
    public $signature = 'workflow:make {name?}';

    public $description = 'Make workflow from stub';

    protected $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    public function handle()
    {
        if (! $this->files->exists('.github/workflows')) {
            $this->files->ensureDirectoryExists('.github/workflows');

            $this->info('Created .github/workflows directory.');
        }

        #$this->call('');
        $this->comment('Making workflows all effin day.');
    }
}
