<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Official;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\OfficialController
 */
class OfficialControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $officials = Official::factory()->count(3)->create();

        $response = $this->get(route('official.index'));

        $response->assertOk();
        $response->assertViewIs('official.index');
        $response->assertViewHas('officials');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('official.create'));

        $response->assertOk();
        $response->assertViewIs('official.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\OfficialController::class,
            'store',
            \App\Http\Requests\OfficialStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $cedula = $this->faker->numberBetween(-10000, 10000);
        $nombrecompleto = $this->faker->word;

        $response = $this->post(route('official.store'), [
            'cedula' => $cedula,
            'nombrecompleto' => $nombrecompleto,
        ]);

        $officials = Official::query()
            ->where('cedula', $cedula)
            ->where('nombrecompleto', $nombrecompleto)
            ->get();
        $this->assertCount(1, $officials);
        $official = $officials->first();

        $response->assertRedirect(route('official.index'));
        $response->assertSessionHas('official.id', $official->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $official = Official::factory()->create();

        $response = $this->get(route('official.show', $official));

        $response->assertOk();
        $response->assertViewIs('official.show');
        $response->assertViewHas('official');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $official = Official::factory()->create();

        $response = $this->get(route('official.edit', $official));

        $response->assertOk();
        $response->assertViewIs('official.edit');
        $response->assertViewHas('official');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\OfficialController::class,
            'update',
            \App\Http\Requests\OfficialUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $official = Official::factory()->create();
        $cedula = $this->faker->numberBetween(-10000, 10000);
        $nombrecompleto = $this->faker->word;

        $response = $this->put(route('official.update', $official), [
            'cedula' => $cedula,
            'nombrecompleto' => $nombrecompleto,
        ]);

        $official->refresh();

        $response->assertRedirect(route('official.index'));
        $response->assertSessionHas('official.id', $official->id);

        $this->assertEquals($cedula, $official->cedula);
        $this->assertEquals($nombrecompleto, $official->nombrecompleto);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $official = Official::factory()->create();

        $response = $this->delete(route('official.destroy', $official));

        $response->assertRedirect(route('official.index'));

        $this->assertDeleted($official);
    }
}
