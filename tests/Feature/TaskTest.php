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
        $response = $this->getJson('api/tasks');

        $response->assertOk()->assertJsonCount($tasks->count());
    }

    /**
     * @test
     */
    public function canCreate()
    {
        $data = [
            'title' => 'test post'
        ];

        $response = $this->postJson('api/tasks', $data);

        $response->assertCreated()
            ->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function canUpdate()
    {
        $task = factory(Task::class)->create();

        $task->title = 'rewrite';

        $response = $this->patchJson("api/tasks/{$task->id}", $task->toArray());

        $response->assertOk()
            ->assertJsonFragment($task->toArray());
    }

    /**
     * @test
     */
    // public function canDelete()
    // {
    //     $tasks = factory(Task::class, 10)->create();

    //     $response = $this->deleteJson("api/tasks/1");
    //     $response->assertOk();

    //     $response = $this->getJson()("api/tasks");
    //     $response->assertJsonCount($tasks->count() - 1);
    // }
}
