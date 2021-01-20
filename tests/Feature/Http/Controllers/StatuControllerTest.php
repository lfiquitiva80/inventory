<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Statu;
use App\Models\Status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\StatuController
 */
class StatuControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $status = Statu::factory()->count(3)->create();

        $response = $this->get(route('statu.index'));

        $response->assertOk();
        $response->assertViewIs('statu.index');
        $response->assertViewHas('status');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('statu.create'));

        $response->assertOk();
        $response->assertViewIs('statu.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StatuController::class,
            'store',
            \App\Http\Requests\StatuStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $estado = $this->faker->word;
        $observaciones = $this->faker->word;

        $response = $this->post(route('statu.store'), [
            'estado' => $estado,
            'observaciones' => $observaciones,
        ]);

        $status = Statu::query()
            ->where('estado', $estado)
            ->where('observaciones', $observaciones)
            ->get();
        $this->assertCount(1, $status);
        $statu = $status->first();

        $response->assertRedirect(route('statu.index'));
        $response->assertSessionHas('statu.id', $statu->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $statu = Statu::factory()->create();

        $response = $this->get(route('statu.show', $statu));

        $response->assertOk();
        $response->assertViewIs('statu.show');
        $response->assertViewHas('statu');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $statu = Statu::factory()->create();

        $response = $this->get(route('statu.edit', $statu));

        $response->assertOk();
        $response->assertViewIs('statu.edit');
        $response->assertViewHas('statu');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StatuController::class,
            'update',
            \App\Http\Requests\StatuUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $statu = Statu::factory()->create();
        $estado = $this->faker->word;
        $observaciones = $this->faker->word;

        $response = $this->put(route('statu.update', $statu), [
            'estado' => $estado,
            'observaciones' => $observaciones,
        ]);

        $statu->refresh();

        $response->assertRedirect(route('statu.index'));
        $response->assertSessionHas('statu.id', $statu->id);

        $this->assertEquals($estado, $statu->estado);
        $this->assertEquals($observaciones, $statu->observaciones);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $statu = Statu::factory()->create();

        $response = $this->delete(route('statu.destroy', $statu));

        $response->assertRedirect(route('statu.index'));

        $this->assertDeleted($statu);
    }
}
