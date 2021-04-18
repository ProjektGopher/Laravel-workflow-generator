<?php

namespace Projektgopher\WorkflowGenerator\Tests\Traits;

trait MocksFilesystem
{
    public function setUp(): void
    {
        parent::setUp();

        $this->files = $this->mock(\Illuminate\Filesystem\Filesystem::class);
        $this->swap('files', $this->files);
    }
}