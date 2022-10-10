<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Task;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function getIndex()
    {
        $tasks = factory(Task::class, 10)->create();
        dd($tasks->toArray());
        $response = $this->getJson('api/tasks');

        $response->assertOk()
            ->assertJsonCount($tasks->count());
    }
}
