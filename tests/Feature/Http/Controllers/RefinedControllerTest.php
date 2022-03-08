<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Refined;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RefinedController
 */
class RefinedControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $refineds = Refined::factory()->count(3)->create();

        $response = $this->get(route('refined.index'));

        $response->assertOk();
        $response->assertViewIs('refined.index');
        $response->assertViewHas('refineds');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('refined.create'));

        $response->assertOk();
        $response->assertViewIs('refined.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RefinedController::class,
            'store',
            \App\Http\Requests\RefinedStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $title = $this->faker->sentence(4);

        $response = $this->post(route('refined.store'), [
            'title' => $title,
        ]);

        $refineds = Refined::query()
            ->where('title', $title)
            ->get();
        $this->assertCount(1, $refineds);
        $refined = $refineds->first();

        $response->assertRedirect(route('refined.index'));
        $response->assertSessionHas('refined.id', $refined->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $refined = Refined::factory()->create();

        $response = $this->get(route('refined.show', $refined));

        $response->assertOk();
        $response->assertViewIs('refined.show');
        $response->assertViewHas('refined');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $refined = Refined::factory()->create();

        $response = $this->get(route('refined.edit', $refined));

        $response->assertOk();
        $response->assertViewIs('refined.edit');
        $response->assertViewHas('refined');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RefinedController::class,
            'update',
            \App\Http\Requests\RefinedUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $refined = Refined::factory()->create();
        $title = $this->faker->sentence(4);

        $response = $this->put(route('refined.update', $refined), [
            'title' => $title,
        ]);

        $refined->refresh();

        $response->assertRedirect(route('refined.index'));
        $response->assertSessionHas('refined.id', $refined->id);

        $this->assertEquals($title, $refined->title);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $refined = Refined::factory()->create();

        $response = $this->delete(route('refined.destroy', $refined));

        $response->assertRedirect(route('refined.index'));

        $this->assertDeleted($refined);
    }
}
