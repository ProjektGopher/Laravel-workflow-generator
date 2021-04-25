<?php

namespace Tests\Feature\Commands;

use Illuminate\Support\LazyCollection;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Projektgopher\WorkflowGenerator\Tests\TestCase;
use Projektgopher\WorkflowGenerator\Tests\Traits\MocksFilesystem;

/**
 * @covers \Projektgopher\WorkflowGenerator\Commands
 */
class ListCommandTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    use MocksFilesystem;

    /** @test */
    public function it_shows_a_list_of_all_available_workflows()
    {
        $this->files->shouldReceive('files')
            ->once()
            ->andReturn(['/some/path/to/stubs/stub.stub']);

        $this->files->shouldReceive('lines')
            ->once()
            ->with('/some/path/to/stubs/stub.stub')
            ->andReturn(
                LazyCollection::make(function () {
                    yield 'name: test stub' . PHP_EOL;
                })
            );

        $this->artisan('workflow:list')
            ->expectsOutput('  [stub] test stub')
            ->assertExitCode(0);
    }
}
