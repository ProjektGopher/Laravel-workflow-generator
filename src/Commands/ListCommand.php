<?php

namespace Projektgopher\WorkflowGenerator\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class ListCommand extends Command
{
    public $signature = 'workflow:list';

    public $description = 'List all currently available workflows';

    protected $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    public function handle()
    {
        $this->info('All available workflows:');
        $this->comment('  [name] workflow description');
        $this->newLine();

        $workflows = $this->files->files(__DIR__ . '/../../stubs');

        foreach ($workflows as $workflow) {
            $filename = Str::between($workflow, 'stubs/', '.stub');
            $description = Str::between($this->files->lines($workflow)->first(), 'name: ', PHP_EOL);
            $this->line("  [{$filename}] {$description}");
            // dd("  [{$filename}] {$description}");
        }

        $this->newLine();
        $this->comment('To place one of these in your .github/workflows directory, use');
        $this->info('php artisan workflow:make [name]');
        $this->newLine();
    }
}
