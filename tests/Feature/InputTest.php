<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputTest extends TestCase
{
    public function test_inputs_route_exist(): void
    {
        $response = $this->get(route('inputs.index'));

        $response->assertStatus(200);
    }
    
    public function test_nodata_route_exist(): void
    {
        $response = $this->get(route('inputs.nodata'));

        $response->assertStatus(200);
    }
    
    public function test_nodata_route_exist_and_no_data_there(): void
    {
        $response = $this->get(route('inputs.nodata'));

        $response->assertStatus(200);
        $response->assertSee(__('Nem található tesztadat.'));
    }

    public function test_inputs_route_exist_and_there_are_some_data(): void
    {
        $response = $this->get(route('inputs.index'));

        $response->assertStatus(200);
        $response->assertDontSee(__('Nem található tesztadat.'));
    }
    
    public function test_inputs_show_route_exist_and_no_data_there(): void
    {
        $response = $this->get(route('inputs.show','non-existent-element'));

        $response->assertStatus(200);
        $response->assertSee(__('Nem található ez a tesztadat.'));
    }
    
    public function test_inputs_show_id1_route_exist_and_there_are_some_data(): void
    {
        $response = $this->get(route('inputs.show','1'));

        $response->assertStatus(200);
        $response->assertSee(__('Vissza'));
    }
}
