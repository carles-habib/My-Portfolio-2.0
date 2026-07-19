<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_index_shows_only_published_posts_for_guests(): void
    {
        $user = $this->createUser();
        $category = Category::create(['name' => 'Tech', 'slug' => 'tech']);

        Post::create([
            'title' => 'Published Post', 'slug' => 'published-post', 'content' => 'Body',
            'category_id' => $category->id, 'user_id' => $user->id,
            'is_published' => true, 'published_at' => now(),
        ]);
        Post::create([
            'title' => 'Draft Post', 'slug' => 'draft-post', 'content' => 'Body',
            'category_id' => $category->id, 'user_id' => $user->id,
            'is_published' => false,
        ]);

        $response = $this->get(route('blog.index'));

        $response->assertStatus(200);
        $response->assertSee('Published Post');
        $response->assertDontSee('Draft Post');
    }

    public function test_show_returns_404_for_unpublished_post(): void
    {
        $user = $this->createUser();
        $category = Category::create(['name' => 'Tech', 'slug' => 'tech']);
        $post = Post::create([
            'title' => 'Draft', 'slug' => 'draft', 'content' => 'Body',
            'category_id' => $category->id, 'user_id' => $user->id,
            'is_published' => false,
        ]);

        $this->get(route('blog.show', $post->slug))->assertStatus(404);
    }

    public function test_admin_can_create_edit_and_delete_a_post(): void
    {
        $user = $this->createUser();
        $category = Category::create(['name' => 'Tech', 'slug' => 'tech']);
        $tag = Tag::create(['name' => 'Laravel', 'slug' => 'laravel']);

        $store = $this->actingAs($user)->post(route('blog.store'), [
            'title' => 'My First Post',
            'category_id' => $category->id,
            'content' => 'Hello world',
            'type' => 'standard',
            'is_published' => '1',
            'tags' => [$tag->id],
        ]);

        $post = Post::firstOrFail();
        $store->assertRedirect(route('blog.index'));
        $this->assertSame('My First Post', $post->title);
        $this->assertTrue($post->is_published);
        $this->assertTrue($post->tags->contains($tag->id));

        $update = $this->actingAs($user)->put(route('blog.update', $post), [
            'title' => 'Updated Title',
            'category_id' => $category->id,
            'content' => 'Updated body',
            'type' => 'standard',
        ]);
        $update->assertRedirect(route('blog.index'));
        $this->assertSame('Updated Title', $post->fresh()->title);

        $destroy = $this->actingAs($user)->delete(route('blog.destroy', $post->fresh()));
        $destroy->assertRedirect(route('blog.index'));
        $this->assertSoftDeleted($post);
    }

    public function test_category_and_tag_filters_only_show_matching_published_posts(): void
    {
        $user = $this->createUser();
        $categoryA = Category::create(['name' => 'A', 'slug' => 'a']);
        $categoryB = Category::create(['name' => 'B', 'slug' => 'b']);

        $postA = Post::create([
            'title' => 'Post A', 'slug' => 'post-a', 'content' => 'Body',
            'category_id' => $categoryA->id, 'user_id' => $user->id,
            'is_published' => true, 'published_at' => now(),
        ]);
        Post::create([
            'title' => 'Post B', 'slug' => 'post-b', 'content' => 'Body',
            'category_id' => $categoryB->id, 'user_id' => $user->id,
            'is_published' => true, 'published_at' => now(),
        ]);

        $response = $this->get(route('blog.category', $categoryA->slug));

        $response->assertStatus(200);
        $response->assertViewHas('posts', function ($posts) use ($postA) {
            return $posts->count() === 1 && $posts->first()->is($postA);
        });
    }
}
