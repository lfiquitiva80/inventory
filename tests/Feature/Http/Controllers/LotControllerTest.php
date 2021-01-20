<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Lot;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LotController
 */
class LotControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $lots = Lot::factory()->count(3)->create();

        $response = $this->get(route('lot.index'));

        $response->assertOk();
        $response->assertViewIs('lot.index');
        $response->assertViewHas('lots');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('lot.create'));

        $response->assertOk();
        $response->assertViewIs('lot.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LotController::class,
            'store',
            \App\Http\Requests\LotStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $FINCACODI = $this->faker->word;
        $LOTECODCC = $this->faker->word;
        $LOTECODI = $this->faker->word;
        $LOTENOMB = $this->faker->word;

        $response = $this->post(route('lot.store'), [
            'FINCACODI' => $FINCACODI,
            'LOTECODCC' => $LOTECODCC,
            'LOTECODI' => $LOTECODI,
            'LOTENOMB' => $LOTENOMB,
        ]);

        $lots = Lot::query()
            ->where('FINCACODI', $FINCACODI)
            ->where('LOTECODCC', $LOTECODCC)
            ->where('LOTECODI', $LOTECODI)
            ->where('LOTENOMB', $LOTENOMB)
            ->get();
        $this->assertCount(1, $lots);
        $lot = $lots->first();

        $response->assertRedirect(route('lot.index'));
        $response->assertSessionHas('lot.id', $lot->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $lot = Lot::factory()->create();

        $response = $this->get(route('lot.show', $lot));

        $response->assertOk();
        $response->assertViewIs('lot.show');
        $response->assertViewHas('lot');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $lot = Lot::factory()->create();

        $response = $this->get(route('lot.edit', $lot));

        $response->assertOk();
        $response->assertViewIs('lot.edit');
        $response->assertViewHas('lot');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LotController::class,
            'update',
            \App\Http\Requests\LotUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $lot = Lot::factory()->create();
        $FINCACODI = $this->faker->word;
        $LOTECODCC = $this->faker->word;
        $LOTECODI = $this->faker->word;
        $LOTENOMB = $this->faker->word;

        $response = $this->put(route('lot.update', $lot), [
            'FINCACODI' => $FINCACODI,
            'LOTECODCC' => $LOTECODCC,
            'LOTECODI' => $LOTECODI,
            'LOTENOMB' => $LOTENOMB,
        ]);

        $lot->refresh();

        $response->assertRedirect(route('lot.index'));
        $response->assertSessionHas('lot.id', $lot->id);

        $this->assertEquals($FINCACODI, $lot->FINCACODI);
        $this->assertEquals($LOTECODCC, $lot->LOTECODCC);
        $this->assertEquals($LOTECODI, $lot->LOTECODI);
        $this->assertEquals($LOTENOMB, $lot->LOTENOMB);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $lot = Lot::factory()->create();

        $response = $this->delete(route('lot.destroy', $lot));

        $response->assertRedirect(route('lot.index'));

        $this->assertDeleted($lot);
    }
}
