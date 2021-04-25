<?php

namespace Tests\Feature\Commands;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Projektgopher\WorkflowGenerator\Tests\TestCase;
use Projektgopher\WorkflowGenerator\Tests\Traits\MocksFilesystem;

/**
 * @covers \Projektgopher\WorkflowGenerator\Commands
 */
class MakeCommandTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    use MocksFilesystem;

    /** @test */
    public function it_creates_a_github_workflows_directory_if_none_exists()
    {
        $this->files->shouldReceive('exists')
            ->once()
            ->with('.github/workflows')
            ->andReturnFalse();
        $this->files->shouldReceive('ensureDirectoryExists')
            ->once()
            ->with('.github/workflows')
            ->andReturnTrue();
        // $this->files->shouldReceive('put')
        //     ->with('draft.yaml', 'stub');

        // $this->files->shouldReceive('exists')->with('app');

        $this->artisan('workflow:make')
            ->expectsOutput('Created .github/workflows directory.')
            ->assertExitCode(0);
    }

    /** @test */
    public function it_does_not_create_a_github_workflows_directory_if_one_exists_already()
    {
        $this->files->shouldReceive('exists')
            ->once()
            ->with('.github/workflows')
            ->andReturnTrue();
        $this->files->shouldNotReceive('makeDirectory');
        // $this->files->shouldReceive('exists')
        //     ->with('app');

        $this->artisan('workflow:make')
            ->assertExitCode(0);
    }
}
