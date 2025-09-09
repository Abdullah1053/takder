<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Vite;
use Illuminate\Support\HtmlString;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Mock Vite to prevent manifest not found errors and other Vite-related issues in tests
        $this->mock(Vite::class)
            ->shouldReceive('useHotFile')->andReturn(false)
            ->shouldReceive('useBuildDirectory')->andReturn(false)
            ->shouldReceive('preloadedAssets')->andReturn([])
            ->shouldReceive('__invoke')->andReturn(new HtmlString(''));
    }

    public function test_authenticated_user_can_create_project(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('projects.store'), [
            'name' => 'New Test Project',
            'description' => 'This is a test description.',
        ]);

        $this->assertDatabaseHas('projects', ['name' => 'New Test Project']);
        $project = Project::first();
        $response->assertRedirect(route('projects.show', $project));
    }

    public function test_authenticated_user_can_see_their_projects(): void
    {
        $user = User::factory()->create();
        $project = Project::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get(route('projects.index'));

        $response->assertStatus(200);
        $response->assertInertia(fn ($assert) => $assert
            ->component('Projects/Index')
            ->has('projects', 1)
            ->where('projects.0.name', $project->name)
        );
    }

    public function test_authenticated_user_cannot_see_others_projects(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        Project::factory()->create(['user_id' => $otherUser->id]);

        $response = $this->actingAs($user)->get(route('projects.index'));

        $response->assertStatus(200);
        $response->assertInertia(fn ($assert) => $assert
            ->component('Projects/Index')
            ->has('projects', 0)
        );
    }

    public function test_user_receives_404_when_viewing_others_project(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $otherProject = Project::factory()->create(['user_id' => $otherUser->id]);

        $response = $this->actingAs($user)->get(route('projects.show', $otherProject));

        $response->assertStatus(404);
    }

    public function test_project_creation_fails_with_invalid_data(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('projects.store'), [
            'name' => 'A', // Too short
        ]);

        $response->assertSessionHasErrors('name');
        $this->assertDatabaseMissing('projects', ['name' => 'A']);
    }

    public function test_authenticated_user_can_update_their_project(): void
    {
        $user = User::factory()->create();
        $project = Project::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->patch(route('projects.update', $project), [
            'name' => 'Updated Project Name',
            'description' => 'Updated description.',
        ]);

        $response->assertRedirect(route('projects.show', $project));
        $this->assertDatabaseHas('projects', ['name' => 'Updated Project Name']);
    }

    public function test_authenticated_user_can_delete_their_project(): void
    {
        $user = User::factory()->create();
        $project = Project::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->delete(route('projects.destroy', $project));

        $response->assertRedirect(route('projects.index'));
        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }
}
