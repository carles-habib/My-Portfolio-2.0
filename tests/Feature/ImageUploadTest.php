<?php

namespace Tests\Feature;

use App\Models\Image;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ImageUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_uploads_and_persists_an_image(): void
    {
        Storage::fake('public');
        $user = $this->createUser();

        $response = $this->actingAs($user)->post(route('images.store'), [
            'image_path' => UploadedFile::fake()->image('hero.jpg'),
        ]);

        $response->assertRedirect(route('hero'));
        $image = Image::firstOrFail();
        Storage::disk('public')->assertExists($image->image_path);
    }

    public function test_store_requires_an_image(): void
    {
        $user = $this->createUser();

        $response = $this->actingAs($user)->post(route('images.store'), []);

        $response->assertSessionHasErrors('image_path');
        $this->assertSame(0, Image::count());
    }

    public function test_destroy_deletes_the_image_record_and_file(): void
    {
        Storage::fake('public');
        $user = $this->createUser();
        $path = UploadedFile::fake()->image('hero.jpg')->store('portfolio', 'public');
        $image = Image::create(['image_path' => $path]);

        $response = $this->actingAs($user)->delete(route('images.destroy', $image));

        $response->assertRedirect(route('hero'));
        $this->assertDatabaseMissing('images', ['id' => $image->id]);
        Storage::disk('public')->assertMissing($path);
    }
}
