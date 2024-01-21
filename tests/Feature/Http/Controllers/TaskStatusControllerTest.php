<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\TaskStatus;
use App\Models\User;

class TaskStatusControllerTest extends TestCase
{
    use refreshDatabase;

    private User $user;
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->make();
    }

    public function testIndex(): void
    {
        $response = $this->get(route('task_statuses.index'));
        $response->assertOk();
    }

    public function testCreate(): void
    {
        $response = $this->actingAs($this->user)->get(route('task_statuses.create'));
        $response->assertOk();
    }

    public function testStore(): void
    {
        $data = TaskStatus::factory()->make(['name' => 'work'])->only('name');
        $response = $this->actingAs($this->user)->post(route('task_statuses.store'), $data);
        $response->assertRedirect(route('task_statuses.index'));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testUpdate(): void
    {
        $status = TaskStatus::factory()->create(['name' => 'work']);
        $data = TaskStatus::factory()->make(['name' => 'subwork'])->only('name');
        $response = $this->actingAs($this->user)->patch(route('task_statuses.update', $status), $data);
        $response->assertRedirect(route('task_statuses.index'));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testDestroy(): void
    {
        $data = TaskStatus::factory()->create(['name' => 'work']);
        $response = $this->actingAs($this->user)->delete(route('task_statuses.destroy', $data));
        $response->assertRedirect(route('task_statuses.index'));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('task_statuses', $data->only('id'));
    }
}
