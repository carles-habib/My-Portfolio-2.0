<?php

namespace Tests\Feature;

use App\Models\PortfolioCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PortfolioCategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_page_loads(): void
    {
        $user = $this->createUser();

        $this->actingAs($user)->get(route('portfolio-categories.index'))->assertStatus(200);
    }

    public function test_store_creates_a_category_with_a_slug(): void
    {
        $user = $this->createUser();

        $response = $this->actingAs($user)->post(route('portfolio-categories.store'), ['name' => 'Branding']);

        $response->assertRedirect(route('portfolio-categories.index'));
        $category = PortfolioCategory::where('name', 'Branding')->firstOrFail();
        $this->assertSame('branding', $category->slug);
    }

    public function test_store_rejects_duplicate_names(): void
    {
        $user = $this->createUser();
        PortfolioCategory::create(['name' => 'Branding', 'slug' => 'branding']);

        $response = $this->actingAs($user)->post(route('portfolio-categories.store'), ['name' => 'Branding']);

        $response->assertSessionHasErrors('name');
        $this->assertSame(1, PortfolioCategory::count());
    }

    public function test_update_renames_the_category_and_regenerates_the_slug(): void
    {
        $user = $this->createUser();
        $category = PortfolioCategory::create(['name' => 'Branding', 'slug' => 'branding']);

        $response = $this->actingAs($user)->put(route('portfolio-categories.update', $category), [
            'name' => 'Brand Strategy',
        ]);

        $response->assertRedirect(route('portfolio-categories.index'));
        $category->refresh();
        $this->assertSame('Brand Strategy', $category->name);
        $this->assertSame('brand-strategy', $category->slug);
    }

    public function test_destroy_removes_the_category(): void
    {
        $user = $this->createUser();
        $category = PortfolioCategory::create(['name' => 'Branding', 'slug' => 'branding']);

        $response = $this->actingAs($user)->delete(route('portfolio-categories.destroy', $category));

        $response->assertRedirect(route('portfolio-categories.index'));
        $this->assertDatabaseMissing('portfolio_categories', ['id' => $category->id]);
    }
}
