<?php

namespace Tests\Feature;

use App\Mail\NewContactMessage;
use App\Models\ContactInfo;
use App\Models\Inbox;
use App\Models\Services;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    private function makeService(string $name, int $order = 1): Services
    {
        return Services::create([
            'order' => $order,
            'name' => $name,
            'brief' => 'Brief',
            'desc1' => 'Desc 1',
            'desc2' => 'Desc 2',
            'desc3' => 'Desc 3',
            'process' => 'Process',
            'processdesc' => 'Process description',
            'objective1' => 'Objective 1',
            'objective2' => 'Objective 2',
        ]);
    }

    public function test_submitmessage_stores_the_inbox_entry_and_notifies_the_site_owner(): void
    {
        Mail::fake();
        ContactInfo::insert(['phone' => '123', 'email' => 'owner@example.com', 'address' => 'Somewhere']);
        $this->makeService('Web Design');

        $response = $this->post(route('submitmessage'), [
            'firstName' => 'Jane',
            'lastName' => 'Doe',
            'email' => 'jane@example.com',
            'phone' => '5551234',
            'service' => 'Web Design',
            'message' => 'Hello there',
        ]);

        $response->assertRedirect(route('home').'#contact-section');
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('inbox', ['firstName' => 'Jane', 'email' => 'jane@example.com']);

        Mail::assertSent(NewContactMessage::class, function ($mail) {
            return $mail->hasTo('owner@example.com') && $mail->inbox->firstName === 'Jane';
        });

        $follow = $this->get($response->headers->get('Location'));
        $follow->assertStatus(200);
        $follow->assertSee('flashSuccessModal', false);
        $follow->assertSee('Your message has been sent. Thanks for reaching out!');
    }

    public function test_submitmessage_requires_the_core_fields(): void
    {
        $response = $this->post(route('submitmessage'), []);

        $response->assertSessionHasErrors(['firstName', 'lastName', 'email', 'phone', 'service', 'message']);
        $response->assertSessionMissing('success');
        $this->assertSame(0, Inbox::count());
    }

    public function test_submitmessage_preserves_input_on_validation_failure(): void
    {
        $this->makeService('Design');

        $response = $this->from('/')->post(route('submitmessage'), [
            'firstName' => 'Jane',
            'lastName' => 'Doe',
            'email' => 'not-an-email',
            'phone' => '5551234',
            'service' => 'Design',
            'message' => 'Hello there',
        ]);

        $response->assertSessionHasErrors('email');
        $response->assertSessionHasInput('firstName', 'Jane');
        $response->assertSessionHasInput('message', 'Hello there');
    }

    public function test_submitmessage_rejects_a_service_that_does_not_exist(): void
    {
        $this->makeService('Web Design');

        $response = $this->post(route('submitmessage'), [
            'firstName' => 'Jane',
            'lastName' => 'Doe',
            'email' => 'jane@example.com',
            'phone' => '5551234',
            'service' => 'Made Up Service',
            'message' => 'Hello there',
        ]);

        $response->assertSessionHasErrors('service');
        $this->assertSame(0, Inbox::count());
    }

    public function test_home_page_lists_real_services_in_the_dropdown(): void
    {
        $this->makeService('Web Design', 1);
        $this->makeService('Web Development', 2);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('<option value="Web Design"', false);
        $response->assertSee('<option value="Web Development"', false);
        $response->assertDontSee('value="uxui"', false);
        $response->assertDontSee('value="app"', false);
    }

    public function test_show_contact_renders_the_contact_info(): void
    {
        $user = $this->createUser();
        ContactInfo::insert(['phone' => '123', 'email' => 'owner@example.com', 'address' => 'Somewhere']);

        $response = $this->actingAs($user)->get(route('ShowContact'));

        $response->assertStatus(200);
        $response->assertSee('owner@example.com');
    }
}
