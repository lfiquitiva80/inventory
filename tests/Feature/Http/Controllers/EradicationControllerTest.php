<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Disease;
use App\Models\Eradication;
use App\Models\Farm;
use App\Models\Inventory;
use App\Models\Lot;
use App\Models\Official;
use App\Models\Type;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EradicationController
 */
class EradicationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $eradications = Eradication::factory()->count(3)->create();

        $response = $this->get(route('eradication.index'));

        $response->assertOk();
        $response->assertViewIs('eradication.index');
        $response->assertViewHas('eradications');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('eradication.create'));

        $response->assertOk();
        $response->assertViewIs('eradication.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EradicationController::class,
            'store',
            \App\Http\Requests\EradicationStoreRequest::class
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

        $response = $this->post(route('eradication.store'), [
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

        $eradications = Eradication::query()
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
        $this->assertCount(1, $eradications);
        $eradication = $eradications->first();

        $response->assertRedirect(route('eradication.index'));
        $response->assertSessionHas('eradication.id', $eradication->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $eradication = Eradication::factory()->create();

        $response = $this->get(route('eradication.show', $eradication));

        $response->assertOk();
        $response->assertViewIs('eradication.show');
        $response->assertViewHas('eradication');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $eradication = Eradication::factory()->create();

        $response = $this->get(route('eradication.edit', $eradication));

        $response->assertOk();
        $response->assertViewIs('eradication.edit');
        $response->assertViewHas('eradication');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EradicationController::class,
            'update',
            \App\Http\Requests\EradicationUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $eradication = Eradication::factory()->create();
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

        $response = $this->put(route('eradication.update', $eradication), [
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

        $eradication->refresh();

        $response->assertRedirect(route('eradication.index'));
        $response->assertSessionHas('eradication.id', $eradication->id);

        $this->assertEquals($farm->id, $eradication->farm_id);
        $this->assertEquals($lot->id, $eradication->lot_id);
        $this->assertEquals($columna, $eradication->columna);
        $this->assertEquals($fila, $eradication->fila);
        $this->assertEquals($disease->id, $eradication->disease_id);
        $this->assertEquals($type->id, $eradication->type_id);
        $this->assertEquals($official->id, $eradication->official_id);
        $this->assertEquals($fecha_erradicacion, $eradication->fecha_erradicacion);
        $this->assertEquals($user->id, $eradication->user_id);
        $this->assertEquals($observaciones, $eradication->observaciones);
        $this->assertEquals($inventory->id, $eradication->inventory_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $eradication = Eradication::factory()->create();

        $response = $this->delete(route('eradication.destroy', $eradication));

        $response->assertRedirect(route('eradication.index'));

        $this->assertDeleted($eradication);
    }
}
