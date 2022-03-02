<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Weighing;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\WeighingController
 */
class WeighingControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $weighings = Weighing::factory()->count(3)->create();

        $response = $this->get(route('weighing.index'));

        $response->assertOk();
        $response->assertViewIs('weighing.index');
        $response->assertViewHas('weighings');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('weighing.create'));

        $response->assertOk();
        $response->assertViewIs('weighing.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\WeighingController::class,
            'store',
            \App\Http\Requests\WeighingStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $title = $this->faker->sentence(4);

        $response = $this->post(route('weighing.store'), [
            'title' => $title,
        ]);

        $weighings = Weighing::query()
            ->where('title', $title)
            ->get();
        $this->assertCount(1, $weighings);
        $weighing = $weighings->first();

        $response->assertRedirect(route('weighing.index'));
        $response->assertSessionHas('weighing.id', $weighing->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $weighing = Weighing::factory()->create();

        $response = $this->get(route('weighing.show', $weighing));

        $response->assertOk();
        $response->assertViewIs('weighing.show');
        $response->assertViewHas('weighing');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $weighing = Weighing::factory()->create();

        $response = $this->get(route('weighing.edit', $weighing));

        $response->assertOk();
        $response->assertViewIs('weighing.edit');
        $response->assertViewHas('weighing');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\WeighingController::class,
            'update',
            \App\Http\Requests\WeighingUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $weighing = Weighing::factory()->create();
        $title = $this->faker->sentence(4);

        $response = $this->put(route('weighing.update', $weighing), [
            'title' => $title,
        ]);

        $weighing->refresh();

        $response->assertRedirect(route('weighing.index'));
        $response->assertSessionHas('weighing.id', $weighing->id);

        $this->assertEquals($title, $weighing->title);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $weighing = Weighing::factory()->create();

        $response = $this->delete(route('weighing.destroy', $weighing));

        $response->assertRedirect(route('weighing.index'));

        $this->assertDeleted($weighing);
    }
}
