<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Label;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LabelControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->make();
    }

    public function testIndexLabels(): void
    {
        $response = $this->get(route('labels.index'));
        $response->assertOk();
    }

    public function testCreateLabel(): void
    {
        $response = $this->actingAs($this->user)->get(route('labels.create'));
        $response->assertOk();
    }

    public function testStoreLabel(): void
    {
        $data = Label::factory()->make(['name' => 'test'])->only('name');
        $response = $this->actingAs($this->user)->post(route('labels.store'), $data);
        $response->assertRedirect(route('labels.index'));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('labels', $data);
    }

    public function testUpdateLabel(): void
    {
        $label = Label::factory()->create(['name' => 'debug']);
        $data = Label::factory()->make(['name' => 'fix'])->only('name');
        $response = $this->actingAs($this->user)->patch(route('labels.update', $label), $data);
        $response->assertRedirect(route('labels.index'));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('labels', $data);
    }

    public function testDeleteLabel(): void
    {
        $label = Label::factory()->create(['name' => 'debug']);
        $response = $this->actingAs($this->user)->delete(route('labels.destroy', $label));
        $response->assertRedirect(route('labels.index'));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('labels', $label->only('id'));
    }
}
