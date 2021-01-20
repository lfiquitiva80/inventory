<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Farm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FarmController
 */
class FarmControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $farms = Farm::factory()->count(3)->create();

        $response = $this->get(route('farm.index'));

        $response->assertOk();
        $response->assertViewIs('farm.index');
        $response->assertViewHas('farms');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('farm.create'));

        $response->assertOk();
        $response->assertViewIs('farm.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FarmController::class,
            'store',
            \App\Http\Requests\FarmStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $fincacodi = $this->faker->word;
        $fincadesc = $this->faker->word;

        $response = $this->post(route('farm.store'), [
            'fincacodi' => $fincacodi,
            'fincadesc' => $fincadesc,
        ]);

        $farms = Farm::query()
            ->where('fincacodi', $fincacodi)
            ->where('fincadesc', $fincadesc)
            ->get();
        $this->assertCount(1, $farms);
        $farm = $farms->first();

        $response->assertRedirect(route('farm.index'));
        $response->assertSessionHas('farm.id', $farm->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $farm = Farm::factory()->create();

        $response = $this->get(route('farm.show', $farm));

        $response->assertOk();
        $response->assertViewIs('farm.show');
        $response->assertViewHas('farm');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $farm = Farm::factory()->create();

        $response = $this->get(route('farm.edit', $farm));

        $response->assertOk();
        $response->assertViewIs('farm.edit');
        $response->assertViewHas('farm');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FarmController::class,
            'update',
            \App\Http\Requests\FarmUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $farm = Farm::factory()->create();
        $fincacodi = $this->faker->word;
        $fincadesc = $this->faker->word;

        $response = $this->put(route('farm.update', $farm), [
            'fincacodi' => $fincacodi,
            'fincadesc' => $fincadesc,
        ]);

        $farm->refresh();

        $response->assertRedirect(route('farm.index'));
        $response->assertSessionHas('farm.id', $farm->id);

        $this->assertEquals($fincacodi, $farm->fincacodi);
        $this->assertEquals($fincadesc, $farm->fincadesc);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $farm = Farm::factory()->create();

        $response = $this->delete(route('farm.destroy', $farm));

        $response->assertRedirect(route('farm.index'));

        $this->assertDeleted($farm);
    }
}
