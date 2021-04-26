<?php

namespace ProjektGopher\WorkflowGenerator\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeCommand extends Command
{
    public $signature = 'workflow:make {name?} {--force}';

    public $description = 'Make workflow from stub';

    protected $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    public function handle()
    {
        if (! $workflow = $this->argument('name')) {
            $this->warn('You must specify the name of the workflow you\'d like to generate.');
            $this->warn('Use php artisan workflow:list to show a list of a available workflows.');

            return;
        }

        if (! $this->files->exists(__DIR__ . "/../../stubs/{$workflow}.stub")) {
            $this->warn("We can't find a workflow named {$workflow}.");
            $this->warn('Use php artisan workflow:list to show a list of a available workflows.');

            return;
        }

        if (! $this->files->exists('.github/workflows')) {
            $this->files->ensureDirectoryExists('.github/workflows');
            $this->info('Created .github/workflows directory.');
        }

        if ($this->files->exists(".github/workflows/{$workflow}.yml")) {
            if ($this->option('force')) {
                $this->comment("Overwriting .github/workflows/{$workflow}.yml");
            } else {
                $this->warn(".github/workflows/{$workflow}.yml already exists.");
                $this->comment("Try using php artisan workflow:make {$workflow} --force");

                return;
            }
        }

        $contents = $this->files->get(__DIR__ . "/../../stubs/{$workflow}.stub");
        $this->files->put(".github/workflows/{$workflow}.yml", $contents);
        $this->info('Workflow saved!');

        $this->comment('Making workflows all effin day.');
    }
}
