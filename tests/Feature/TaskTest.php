<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Vite;
use Illuminate\Support\HtmlString;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mock(Vite::class)
            ->shouldReceive('useHotFile')->andReturn(false)
            ->shouldReceive('useBuildDirectory')->andReturn(false)
            ->shouldReceive('preloadedAssets')->andReturn([])
            ->shouldReceive('__invoke')->andReturn(new HtmlString(''));
    }

    public function test_user_can_add_task_to_their_own_project(): void
    {
        $user = User::factory()->create();
        $project = Project::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->post(route('tasks.store'), [
            'title' => 'A new task',
            'project_id' => $project->id,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('tasks', ['title' => 'A new task', 'project_id' => $project->id]);
    }

    public function test_user_cannot_add_task_to_others_project(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $otherProject = Project::factory()->create(['user_id' => $otherUser->id]);

        $response = $this->actingAs($user)->post(route('tasks.store'), [
            'title' => 'A sneaky task',
            'project_id' => $otherProject->id,
        ]);

        $response->assertStatus(404);
        $this->assertDatabaseMissing('tasks', ['title' => 'A sneaky task']);
    }

    public function test_user_can_update_status_of_their_own_task(): void
    {
        $user = User::factory()->create();
        $project = Project::factory()->create(['user_id' => $user->id]);
        $task = Task::factory()->create(['project_id' => $project->id, 'status' => 'Backlog']);

        $response = $this->actingAs($user)->patch(route('tasks.update', $task), [
            'status' => 'In Progress',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('tasks', ['id' => $task->id, 'status' => 'In Progress']);
    }

    public function test_user_cannot_update_others_task(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $otherProject = Project::factory()->create(['user_id' => $otherUser->id]);
        $otherTask = Task::factory()->create(['project_id' => $otherProject->id]);

        $response = $this->actingAs($user)->patch(route('tasks.update', $otherTask), [
            'status' => 'Done',
        ]);

        $response->assertStatus(404);
        $this->assertDatabaseMissing('tasks', ['id' => $otherTask->id, 'status' => 'Done']);
    }

    public function test_task_status_update_fails_with_invalid_status(): void
    {
        $user = User::factory()->create();
        $project = Project::factory()->create(['user_id' => $user->id]);
        $task = Task::factory()->create(['project_id' => $project->id]);

        $response = $this->actingAs($user)->patch(route('tasks.update', $task), [
            'status' => 'Invalid Status',
        ]);

        $response->assertSessionHasErrors('status');
        $this->assertDatabaseHas('tasks', ['id' => $task->id, 'status' => 'Backlog']); // Stays the same
    }

    public function test_user_can_delete_their_own_task(): void
    {
        $user = User::factory()->create();
        $project = Project::factory()->create(['user_id' => $user->id]);
        $task = Task::factory()->create(['project_id' => $project->id]);

        $response = $this->actingAs($user)->delete(route('tasks.destroy', $task));

        $response->assertRedirect();
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
