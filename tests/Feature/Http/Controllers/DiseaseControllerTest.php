<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Disease;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DiseaseController
 */
class DiseaseControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $diseases = Disease::factory()->count(3)->create();

        $response = $this->get(route('disease.index'));

        $response->assertOk();
        $response->assertViewIs('disease.index');
        $response->assertViewHas('diseases');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('disease.create'));

        $response->assertOk();
        $response->assertViewIs('disease.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DiseaseController::class,
            'store',
            \App\Http\Requests\DiseaseStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $enfermedad = $this->faker->word;
        $observaciones = $this->faker->word;

        $response = $this->post(route('disease.store'), [
            'enfermedad' => $enfermedad,
            'observaciones' => $observaciones,
        ]);

        $diseases = Disease::query()
            ->where('enfermedad', $enfermedad)
            ->where('observaciones', $observaciones)
            ->get();
        $this->assertCount(1, $diseases);
        $disease = $diseases->first();

        $response->assertRedirect(route('disease.index'));
        $response->assertSessionHas('disease.id', $disease->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $disease = Disease::factory()->create();

        $response = $this->get(route('disease.show', $disease));

        $response->assertOk();
        $response->assertViewIs('disease.show');
        $response->assertViewHas('disease');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $disease = Disease::factory()->create();

        $response = $this->get(route('disease.edit', $disease));

        $response->assertOk();
        $response->assertViewIs('disease.edit');
        $response->assertViewHas('disease');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DiseaseController::class,
            'update',
            \App\Http\Requests\DiseaseUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $disease = Disease::factory()->create();
        $enfermedad = $this->faker->word;
        $observaciones = $this->faker->word;

        $response = $this->put(route('disease.update', $disease), [
            'enfermedad' => $enfermedad,
            'observaciones' => $observaciones,
        ]);

        $disease->refresh();

        $response->assertRedirect(route('disease.index'));
        $response->assertSessionHas('disease.id', $disease->id);

        $this->assertEquals($enfermedad, $disease->enfermedad);
        $this->assertEquals($observaciones, $disease->observaciones);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $disease = Disease::factory()->create();

        $response = $this->delete(route('disease.destroy', $disease));

        $response->assertRedirect(route('disease.index'));

        $this->assertDeleted($disease);
    }
}
