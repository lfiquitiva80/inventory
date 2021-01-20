<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Farm;
use App\Models\Inventory;
use App\Models\Lot;
use App\Models\Statu;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\InventoryController
 */
class InventoryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $inventories = Inventory::factory()->count(3)->create();

        $response = $this->get(route('inventory.index'));

        $response->assertOk();
        $response->assertViewIs('inventory.index');
        $response->assertViewHas('inventories');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('inventory.create'));

        $response->assertOk();
        $response->assertViewIs('inventory.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\InventoryController::class,
            'store',
            \App\Http\Requests\InventoryStoreRequest::class
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
        $statu = Statu::factory()->create();
        $user = User::factory()->create();

        $response = $this->post(route('inventory.store'), [
            'farm_id' => $farm->id,
            'lot_id' => $lot->id,
            'columna' => $columna,
            'fila' => $fila,
            'statu_id' => $statu->id,
            'user_id' => $user->id,
        ]);

        $inventories = Inventory::query()
            ->where('farm_id', $farm->id)
            ->where('lot_id', $lot->id)
            ->where('columna', $columna)
            ->where('fila', $fila)
            ->where('statu_id', $statu->id)
            ->where('user_id', $user->id)
            ->get();
        $this->assertCount(1, $inventories);
        $inventory = $inventories->first();

        $response->assertRedirect(route('inventory.index'));
        $response->assertSessionHas('inventory.id', $inventory->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $inventory = Inventory::factory()->create();

        $response = $this->get(route('inventory.show', $inventory));

        $response->assertOk();
        $response->assertViewIs('inventory.show');
        $response->assertViewHas('inventory');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $inventory = Inventory::factory()->create();

        $response = $this->get(route('inventory.edit', $inventory));

        $response->assertOk();
        $response->assertViewIs('inventory.edit');
        $response->assertViewHas('inventory');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\InventoryController::class,
            'update',
            \App\Http\Requests\InventoryUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $inventory = Inventory::factory()->create();
        $farm = Farm::factory()->create();
        $lot = Lot::factory()->create();
        $columna = $this->faker->numberBetween(-10000, 10000);
        $fila = $this->faker->numberBetween(-10000, 10000);
        $statu = Statu::factory()->create();
        $user = User::factory()->create();

        $response = $this->put(route('inventory.update', $inventory), [
            'farm_id' => $farm->id,
            'lot_id' => $lot->id,
            'columna' => $columna,
            'fila' => $fila,
            'statu_id' => $statu->id,
            'user_id' => $user->id,
        ]);

        $inventory->refresh();

        $response->assertRedirect(route('inventory.index'));
        $response->assertSessionHas('inventory.id', $inventory->id);

        $this->assertEquals($farm->id, $inventory->farm_id);
        $this->assertEquals($lot->id, $inventory->lot_id);
        $this->assertEquals($columna, $inventory->columna);
        $this->assertEquals($fila, $inventory->fila);
        $this->assertEquals($statu->id, $inventory->statu_id);
        $this->assertEquals($user->id, $inventory->user_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $inventory = Inventory::factory()->create();

        $response = $this->delete(route('inventory.destroy', $inventory));

        $response->assertRedirect(route('inventory.index'));

        $this->assertDeleted($inventory);
    }
}
