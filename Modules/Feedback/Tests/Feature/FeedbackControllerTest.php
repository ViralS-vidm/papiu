<?php

namespace Modules\Feedback\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Core\Tests\Concerns\AuthRoute;
use Modules\Feedback\Entities\Feedback;
use Tests\TestCase;

class FeedbackControllerTest extends TestCase
{
    use RefreshDatabase, AuthRoute;

    /** @test */
    public function it_can_access_feedback_list()
    {
        $response = $this->get(route('feedbacks.index'));
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_access_feedback_create_form()
    {
        $response = $this->get(route('feedbacks.create'));
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_store_new_feedback()
    {
        $this->assertDatabaseCount('feedbacks', 0);

        $feedback = factory(Feedback::class)->make()->toArray();
        $response = $this->post(route('feedbacks.store'), $feedback);

        $response->assertRedirect(route('feedbacks.index'));
        $response->assertSessionHas(config('core.session_success'));
        $this->assertDatabaseHas('feedbacks', $feedback);
        $this->assertDatabaseCount('feedbacks', 1);
    }

    /** @test */
    public function it_can_access_feedback_edit_form()
    {
        $feedback = factory(Feedback::class)->make()->toArray();
        $this->post(route('feedbacks.store'), $feedback);

        $response = $this->get(route('feedbacks.edit', [1]));
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_existing_feedback()
    {
        $feedback = factory(Feedback::class)->make()->toArray();
        $this->post(route('feedbacks.store'), $feedback);

        $feedbackEdit = factory(Feedback::class)->make()->toArray();

        $response = $this->patch(route('feedbacks.update', [1]), $feedbackEdit);

        $response->assertRedirect(route('feedbacks.index'));
        $response->assertSessionHas(config('core.session_success'));
        $this->assertDatabaseHas('feedbacks', $feedbackEdit);
    }

    /** @test */
    public function it_can_delete_existing_feedback()
    {
        $feedback = factory(Feedback::class)->make()->toArray();
        $this->post(route('feedbacks.store'), $feedback);
        $this->assertDatabaseCount('feedbacks', 1);

        $response = $this->delete(route('feedbacks.destroy', [1]));

        $response->assertRedirect(route('feedbacks.index'));
        $response->assertSessionHas(config('core.session_success'));
        $this->assertDatabaseMissing('feedbacks', $feedback);
        $this->assertDatabaseCount('feedbacks', 0);
    }
}
