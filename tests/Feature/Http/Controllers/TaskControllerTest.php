<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\TaskStatus;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\User;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;
    private User $user;
    private TaskStatus $status;
    private Task $task;

    private array $dataStore;
    private array $dataUpdate;
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->status = TaskStatus::factory()->create(['name' => 'new']);
        $this->task = Task::factory()
            ->create([
                'status_id' => $this->status->id,
                'created_by_id' => $this->user->id,
                'assigned_to_id' => $this->user->id
            ]);
        $this->dataStore = Task::factory()
            ->make([
                'status_id' => $this->status->id,
                'created_by_id' => $this->user->id,
                'assigned_to_id' => $this->user->id
            ])
            ->toArray();
        $this->dataUpdate = Task::factory()
            ->make([
                'name' => 'update',
                'description' => null,
                'status_id' => $this->status->id,
                'created_by_id' => $this->user->id,
                'assigned_to_id' => null
            ])
            ->toArray();
    }

    public function testIndexTasks(): void
    {
        $response = $this->get(route('tasks.index'));
        $response->assertOk();
    }

    public function testCreateTask(): void
    {
        $response = $this->actingAs($this->user)->get(route('tasks.create'));
        $response->assertOk();
    }

    public function testShowTask(): void
    {
        $response = $this->get(route('tasks.show', $this->task));
        $response->assertOk();
    }

    public function testStoreTask()
    {
        $response = $this->actingAs($this->user)->post(route('tasks.store'), $this->dataStore);
        $response->assertRedirect(route('tasks.index'));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('tasks', $this->dataStore);
    }

    public function testEditTask(): void
    {
        $response = $this->actingAs($this->user)->patch(route('tasks.update', $this->task), $this->dataUpdate);
        $response->assertRedirect(route('tasks.index'));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('tasks', $this->dataUpdate);
    }

    public function testDeleteTask()
    {
        $task = $this->task;
        $response = $this->actingAs($this->user)->delete(route('tasks.destroy', $task));
        $response->assertRedirect(route('tasks.index'));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('tasks', $task->only('id'));
    }
}
