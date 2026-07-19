<?php

namespace Tests\Feature;

use App\Models\skills as Skill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SkillsTest extends TestCase
{
    use RefreshDatabase;

    public function test_skillstore_creates_a_skill_owned_by_the_logged_in_user(): void
    {
        Storage::fake('public');
        $user = $this->createUser();

        $response = $this->actingAs($user)->post(route('skillstore'), [
            'name' => 'Laravel',
            'image' => UploadedFile::fake()->image('laravel.png'),
        ]);

        $response->assertRedirect('/skill');
        $skill = Skill::firstOrFail();
        $this->assertSame('Laravel', $skill->name);
        $this->assertSame($user->id, $skill->user_id);
        Storage::disk('public')->assertExists($skill->image);
    }

    public function test_update_redirects_to_skill_list(): void
    {
        $user = $this->createUser();
        $skill = Skill::create(['name' => 'PHP', 'image' => 'skills/php.png', 'user_id' => $user->id]);

        $response = $this->actingAs($user)->put(route('skills.update', $skill), [
            'name' => 'PHP 8',
        ]);

        $response->assertRedirect(route('skill'));
        $this->assertSame('PHP 8', $skill->fresh()->name);
    }

    public function test_destroy_removes_the_skill(): void
    {
        $user = $this->createUser();
        $skill = Skill::create(['name' => 'Vue', 'image' => 'skills/vue.png', 'user_id' => $user->id]);

        $response = $this->actingAs($user)->delete(route('skills.destroy', $skill->id));

        $response->assertRedirect();
        $this->assertDatabaseMissing('skills', ['id' => $skill->id]);
    }
}
