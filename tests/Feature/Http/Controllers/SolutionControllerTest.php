<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Solution;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SolutionController
 */
class SolutionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $solutions = Solution::factory()->count(3)->create();

        $response = $this->get(route('solution.index'));

        $response->assertOk();
        $response->assertViewIs('solution.index');
        $response->assertViewHas('solutions');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('solution.create'));

        $response->assertOk();
        $response->assertViewIs('solution.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SolutionController::class,
            'store',
            \App\Http\Requests\SolutionStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $title = $this->faker->sentence(4);

        $response = $this->post(route('solution.store'), [
            'title' => $title,
        ]);

        $solutions = Solution::query()
            ->where('title', $title)
            ->get();
        $this->assertCount(1, $solutions);
        $solution = $solutions->first();

        $response->assertRedirect(route('solution.index'));
        $response->assertSessionHas('solution.id', $solution->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $solution = Solution::factory()->create();

        $response = $this->get(route('solution.show', $solution));

        $response->assertOk();
        $response->assertViewIs('solution.show');
        $response->assertViewHas('solution');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $solution = Solution::factory()->create();

        $response = $this->get(route('solution.edit', $solution));

        $response->assertOk();
        $response->assertViewIs('solution.edit');
        $response->assertViewHas('solution');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SolutionController::class,
            'update',
            \App\Http\Requests\SolutionUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $solution = Solution::factory()->create();
        $title = $this->faker->sentence(4);

        $response = $this->put(route('solution.update', $solution), [
            'title' => $title,
        ]);

        $solution->refresh();

        $response->assertRedirect(route('solution.index'));
        $response->assertSessionHas('solution.id', $solution->id);

        $this->assertEquals($title, $solution->title);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $solution = Solution::factory()->create();

        $response = $this->delete(route('solution.destroy', $solution));

        $response->assertRedirect(route('solution.index'));

        $this->assertDeleted($solution);
    }
}
