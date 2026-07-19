<?php

namespace Tests\Feature;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\PortfolioGallery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    use RefreshDatabase;

    private function makePortfolio(array $overrides = []): Portfolio
    {
        return Portfolio::create(array_merge([
            'title' => 'Project One',
            'description' => 'Short desc',
            'portfolio_description' => 'Long desc',
            'category' => 'Web Design',
            'client' => 'Acme',
            'start_date' => '2024-01-01',
            'designer' => 'Jane',
            'live_url' => 'https://example.com',
            'image_path' => 'portfolio/one.jpg',
            'story' => 'Story',
            'approach' => 'Approach',
        ], $overrides));
    }

    public function test_show_returns_portfolio_with_previous_and_next(): void
    {
        $first = $this->makePortfolio(['title' => 'First']);
        $second = $this->makePortfolio(['title' => 'Second']);
        $third = $this->makePortfolio(['title' => 'Third']);

        $response = $this->get(route('portfolio.show', $second->id));

        $response->assertStatus(200);
        $response->assertViewHas('portfolio', fn ($p) => $p->is($second));
        $response->assertViewHas('previous', fn ($p) => $p->is($first));
        $response->assertViewHas('next', fn ($p) => $p->is($third));
    }

    public function test_filter_returns_only_matching_category(): void
    {
        $this->makePortfolio(['title' => 'Web One', 'category' => 'Web Design']);
        $this->makePortfolio(['title' => 'App One', 'category' => 'App Development']);

        $response = $this->post(route('portfolio.filter'), ['category' => 'Web Design']);

        $response->assertStatus(200);
        $response->assertJsonFragment([]);
        $response->assertSee('Web One');
        $response->assertDontSee('App One');
    }

    private function storePayload(array $overrides = []): array
    {
        return array_merge([
            'title' => 'New Project',
            'description' => 'Desc',
            'portfolio_description' => 'Long desc',
            'category' => 'Web Design',
            'client' => 'Acme',
            'live_url' => 'https://example.com',
            'start_date' => '2024-01-01',
            'story' => 'Story',
            'designer' => 'Jane',
            'approach' => 'Approach',
            'image_path' => UploadedFile::fake()->image('main.jpg'),
        ], $overrides);
    }

    public function test_storeportfolio_creates_record_with_only_the_main_image(): void
    {
        Storage::fake('public');
        $user = $this->createUser();
        PortfolioCategory::create(['name' => 'Web Design', 'slug' => 'web-design']);

        $response = $this->actingAs($user)->post(route('storeportfolio'), $this->storePayload());

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $portfolio = Portfolio::firstOrFail();
        $this->assertSame('New Project', $portfolio->title);
        Storage::disk('public')->assertExists($portfolio->image_path);
        $this->assertSame(0, $portfolio->gallery()->count());
    }

    public function test_storeportfolio_populates_gallery_when_provided(): void
    {
        Storage::fake('public');
        $user = $this->createUser();
        PortfolioCategory::create(['name' => 'Web Design', 'slug' => 'web-design']);

        $response = $this->actingAs($user)->post(route('storeportfolio'), $this->storePayload([
            'gallery' => [
                UploadedFile::fake()->image('g1.jpg'),
                UploadedFile::fake()->image('g2.jpg'),
            ],
        ]));

        $response->assertSessionHasNoErrors();
        $portfolio = Portfolio::firstOrFail();
        $this->assertSame(2, PortfolioGallery::where('portfolio_id', $portfolio->id)->count());
    }

    public function test_storeportfolio_requires_the_main_image(): void
    {
        $user = $this->createUser();
        $payload = $this->storePayload();
        unset($payload['image_path']);

        $response = $this->actingAs($user)->post(route('storeportfolio'), $payload);

        $response->assertSessionHasErrors('image_path');
        $this->assertSame(0, Portfolio::count());
    }

    public function test_destroy_deletes_the_portfolio(): void
    {
        $user = $this->createUser();
        $portfolio = $this->makePortfolio();

        $response = $this->actingAs($user)->delete(route('portfolio.destroy', $portfolio->id));

        $response->assertRedirect();
        $this->assertDatabaseMissing('portfolios', ['id' => $portfolio->id]);
    }
}
