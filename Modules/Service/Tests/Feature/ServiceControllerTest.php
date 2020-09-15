<?php

namespace Modules\Service\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Core\Tests\Concerns\AuthRoute;
use Modules\Service\Entities\Service;
use Tests\TestCase;

class ServiceControllerTest extends TestCase
{
    use RefreshDatabase, AuthRoute;

    /** @test */
    public function it_can_access_service_list()
    {
        $response = $this->get(route('services.index'));
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_access_service_create_form()
    {
        $response = $this->get(route('services.create'));
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_store_new_service()
    {
        $this->assertDatabaseCount('services', 0);

        $service = factory(Service::class)->make()->toArray();
        $response = $this->post(route('services.store'), $service);

        $response->assertRedirect(route('services.index'));
        $response->assertSessionHas(config('core.session_success'));
        $this->assertDatabaseHas('services', $service);
        $this->assertDatabaseCount('services', 1);
    }

    /** @test */
    public function it_can_access_service_edit_form()
    {
        $service = factory(Service::class)->make()->toArray();
        $this->post(route('services.store'), $service);

        $response = $this->get(route('services.edit', [1]));
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_existing_service()
    {
        $service = factory(Service::class)->make()->toArray();
        $this->post(route('services.store'), $service);

        $serviceEdit = factory(Service::class)->make()->toArray();

        $response = $this->patch(route('services.update', [1]), $serviceEdit);

        $response->assertRedirect(route('services.index'));
        $response->assertSessionHas(config('core.session_success'));
        $this->assertDatabaseHas('services', $serviceEdit);
    }

    /** @test */
    public function it_can_delete_existing_service()
    {
        $service = factory(Service::class)->make()->toArray();
        $this->post(route('services.store'), $service);
        $this->assertDatabaseCount('services', 1);

        $response = $this->delete(route('services.destroy', [1]));

        $response->assertRedirect(route('services.index'));
        $response->assertSessionHas(config('core.session_success'));
        $this->assertDatabaseMissing('services', $service);
        $this->assertDatabaseCount('services', 0);
    }

}
