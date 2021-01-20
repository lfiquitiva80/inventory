<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Disease;
use App\Models\Farm;
use App\Models\Inventory;
use App\Models\Lot;
use App\Models\Official;
use App\Models\Review;
use App\Models\Type;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ReviewController
 */
class ReviewControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $reviews = Review::factory()->count(3)->create();

        $response = $this->get(route('review.index'));

        $response->assertOk();
        $response->assertViewIs('review.index');
        $response->assertViewHas('reviews');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('review.create'));

        $response->assertOk();
        $response->assertViewIs('review.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ReviewController::class,
            'store',
            \App\Http\Requests\ReviewStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $farm = Farm::factory()->create();
        $lot = Lot::factory()->create();
        $columna = $this->faker->numberBetween(-10000, 10000);
        $fila = $this->faker->numberBetween(-10000, 10000);
        $disease = Disease::factory()->create();
        $type = Type::factory()->create();
        $official = Official::factory()->create();
        $fecha_erradicacion = $this->faker->dateTime();
        $user = User::factory()->create();
        $observaciones = $this->faker->text;
        $inventory = Inventory::factory()->create();

        $response = $this->post(route('review.store'), [
            'farm_id' => $farm->id,
            'lot_id' => $lot->id,
            'columna' => $columna,
            'fila' => $fila,
            'disease_id' => $disease->id,
            'type_id' => $type->id,
            'official_id' => $official->id,
            'fecha_erradicacion' => $fecha_erradicacion,
            'user_id' => $user->id,
            'observaciones' => $observaciones,
            'inventory_id' => $inventory->id,
        ]);

        $reviews = Review::query()
            ->where('farm_id', $farm->id)
            ->where('lot_id', $lot->id)
            ->where('columna', $columna)
            ->where('fila', $fila)
            ->where('disease_id', $disease->id)
            ->where('type_id', $type->id)
            ->where('official_id', $official->id)
            ->where('fecha_erradicacion', $fecha_erradicacion)
            ->where('user_id', $user->id)
            ->where('observaciones', $observaciones)
            ->where('inventory_id', $inventory->id)
            ->get();
        $this->assertCount(1, $reviews);
        $review = $reviews->first();

        $response->assertRedirect(route('review.index'));
        $response->assertSessionHas('review.id', $review->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $review = Review::factory()->create();

        $response = $this->get(route('review.show', $review));

        $response->assertOk();
        $response->assertViewIs('review.show');
        $response->assertViewHas('review');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $review = Review::factory()->create();

        $response = $this->get(route('review.edit', $review));

        $response->assertOk();
        $response->assertViewIs('review.edit');
        $response->assertViewHas('review');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ReviewController::class,
            'update',
            \App\Http\Requests\ReviewUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $review = Review::factory()->create();
        $farm = Farm::factory()->create();
        $lot = Lot::factory()->create();
        $columna = $this->faker->numberBetween(-10000, 10000);
        $fila = $this->faker->numberBetween(-10000, 10000);
        $disease = Disease::factory()->create();
        $type = Type::factory()->create();
        $official = Official::factory()->create();
        $fecha_erradicacion = $this->faker->dateTime();
        $user = User::factory()->create();
        $observaciones = $this->faker->text;
        $inventory = Inventory::factory()->create();

        $response = $this->put(route('review.update', $review), [
            'farm_id' => $farm->id,
            'lot_id' => $lot->id,
            'columna' => $columna,
            'fila' => $fila,
            'disease_id' => $disease->id,
            'type_id' => $type->id,
            'official_id' => $official->id,
            'fecha_erradicacion' => $fecha_erradicacion,
            'user_id' => $user->id,
            'observaciones' => $observaciones,
            'inventory_id' => $inventory->id,
        ]);

        $review->refresh();

        $response->assertRedirect(route('review.index'));
        $response->assertSessionHas('review.id', $review->id);

        $this->assertEquals($farm->id, $review->farm_id);
        $this->assertEquals($lot->id, $review->lot_id);
        $this->assertEquals($columna, $review->columna);
        $this->assertEquals($fila, $review->fila);
        $this->assertEquals($disease->id, $review->disease_id);
        $this->assertEquals($type->id, $review->type_id);
        $this->assertEquals($official->id, $review->official_id);
        $this->assertEquals($fecha_erradicacion, $review->fecha_erradicacion);
        $this->assertEquals($user->id, $review->user_id);
        $this->assertEquals($observaciones, $review->observaciones);
        $this->assertEquals($inventory->id, $review->inventory_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $review = Review::factory()->create();

        $response = $this->delete(route('review.destroy', $review));

        $response->assertRedirect(route('review.index'));

        $this->assertDeleted($review);
    }
}
