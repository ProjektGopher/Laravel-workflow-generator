<?php

namespace Tests\Feature\Commands;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use ProjektGopher\WorkflowGenerator\Tests\TestCase;
use ProjektGopher\WorkflowGenerator\Tests\Traits\MocksFilesystem;

/**
 * @covers \ProjektGopher\WorkflowGenerator\Commands
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
            ->andReturnTrue();

        $this->files->shouldReceive('exists')
            ->once()
            ->with('.github/workflows')
            ->andReturnFalse();
        
        $this->files->shouldReceive('exists')
            ->once()
            ->with('.github/workflows/stub.yml')
            ->andReturnFalse();

        $this->files->shouldReceive('ensureDirectoryExists')
            ->once()
            ->with('.github/workflows')
            ->andReturnTrue();

        $this->files->shouldReceive('get')
            ->once()
            ->andReturn('stub');

        $this->files->shouldReceive('put')
            ->once()
            ->with('.github/workflows/stub.yml', 'stub')
            ->andReturnTrue();

        $this->artisan('workflow:make stub')
            ->expectsOutput('Created .github/workflows directory.')
            ->assertExitCode(0);
    }

    /** @test */
    public function it_does_not_create_a_github_workflows_directory_if_one_exists_already()
    {
        $this->files->shouldReceive('exists')
            ->once()
            ->andReturnTrue();

        $this->files->shouldReceive('exists')
            ->once()
            ->with('.github/workflows')
            ->andReturnTrue();
        $this->files->shouldNotReceive('ensureDirectoryExists');

        $this->files->shouldReceive('exists')
            ->once()
            ->with('.github/workflows/stub.yml')
            ->andReturnTrue();

        $this->artisan('workflow:make stub')
            ->assertExitCode(0);
    }

    /** @test */
    public function a_named_workflow_must_exist()
    {
        $this->files->shouldReceive('exists')
            ->once()
            ->andReturnFalse();

        $this->artisan('workflow:make blargh')
            ->expectsOutput('We can\'t find a workflow named blargh.')
            ->expectsOutput('Use php artisan workflow:list to show a list of a available workflows.')
            ->assertExitCode(0);
    }

    /** @test */
    public function it_creates_a_workflow_from_stub_with_provided_name()
    {
        $this->files->shouldReceive('exists')
            ->once()
            ->andReturnTrue();

        $this->files->shouldReceive('exists')
            ->once()
            ->with('.github/workflows')
            ->andReturnTrue();
        $this->files->shouldNotReceive('ensureDirectoryExists');

        $this->files->shouldReceive('exists')
            ->once()
            ->with('.github/workflows/stub.yml')
            ->andReturnFalse();

        $this->files->shouldReceive('get')
            ->once()
            ->andReturn('stub');

        $this->files->shouldReceive('put')
            ->once()
            ->with('.github/workflows/stub.yml', 'stub')
            ->andReturnTrue();

        $this->artisan('workflow:make stub')
            ->expectsOutput('Workflow saved!')
            ->assertExitCode(0);
    }

    /** @test */
    public function it_will_not_overwrite_an_existing_workflow()
    {
        $this->files->shouldReceive('exists')
            ->once()
            ->andReturnTrue();

        $this->files->shouldReceive('exists')
            ->once()
            ->with('.github/workflows')
            ->andReturnTrue();
        $this->files->shouldNotReceive('ensureDirectoryExists');

        $this->files->shouldReceive('exists')
            ->once()
            ->with('.github/workflows/stub.yml')
            ->andReturnTrue();

        $this->files->shouldNotReceive('put');

        $this->artisan('workflow:make stub')
            ->expectsOutput('.github/workflows/stub.yml already exists.')
            ->expectsOutput('Try using php artisan workflow:make stub --force')
            ->assertExitCode(0);
    }

    /** @test */
    public function it_will_overwrite_an_existing_workflow_if_the_force_option_is_present()
    {
        $this->files->shouldReceive('exists')
            ->once()
            ->andReturnTrue();

        $this->files->shouldReceive('exists')
            ->once()
            ->with('.github/workflows')
            ->andReturnTrue();
        $this->files->shouldNotReceive('ensureDirectoryExists');

        $this->files->shouldReceive('exists')
            ->once()
            ->with('.github/workflows/stub.yml')
            ->andReturnTrue();

        $this->files->shouldReceive('get')
            ->once()
            ->andReturn('stub');

        $this->files->shouldReceive('put')
            ->once()
            ->with('.github/workflows/stub.yml', 'stub')
            ->andReturnTrue();

        $this->artisan('workflow:make stub --force')
            ->expectsOutput('Overwriting .github/workflows/stub.yml')
            ->expectsOutput('Workflow saved!')
            ->assertExitCode(0);
    }
}
