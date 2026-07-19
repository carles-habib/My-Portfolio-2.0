<?php

namespace Tests\Feature;

use App\Models\FunFact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FunfactsTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_creates_a_funfact(): void
    {
        $user = $this->createUser();

        $response = $this->actingAs($user)->post(route('funfacts.store'), [
            'no' => '350',
            'top' => 'Projects',
            'bottom' => 'Completed',
        ]);

        $response->assertRedirect(route('hero'));
        $funfact = FunFact::firstOrFail();
        $this->assertSame('350', $funfact->no);
        $this->assertSame('Projects', $funfact->top);
    }

    public function test_update_edits_an_existing_funfact(): void
    {
        $user = $this->createUser();
        $funfact = FunFact::create(['no' => '10', 'top' => 'Old', 'bottom' => 'Value']);

        $response = $this->actingAs($user)->put(route('funfacts.update', $funfact), [
            'no' => '20',
            'top' => 'New',
            'bottom' => 'Value',
        ]);

        $response->assertRedirect(route('hero'));
        $funfact->refresh();
        $this->assertSame('20', $funfact->no);
        $this->assertSame('New', $funfact->top);
    }

    public function test_destroy_removes_the_funfact(): void
    {
        $user = $this->createUser();
        $funfact = FunFact::create(['no' => '10', 'top' => 'Old', 'bottom' => 'Value']);

        $response = $this->actingAs($user)->delete(route('funfacts.destroy', $funfact));

        $response->assertRedirect(route('hero'));
        $this->assertDatabaseMissing('fun_facts', ['id' => $funfact->id]);
    }
}
