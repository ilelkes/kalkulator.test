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
        $response = $this->get(route('inputs.show', 'non-existent-element'));

        $response->assertStatus(200);
        $response->assertSee(__('Nem található ez a tesztadat.'));
    }

    public function test_inputs_show_id1_route_exist_and_there_are_some_data(): void
    {
        $response = $this->get(route('inputs.show', '1'));

        $response->assertStatus(200);
        $response->assertSee(__('Vissza az adatokhoz'));
        $response->assertDontSee(__('Nem található ez a tesztadat.'));
    }

    /* Alap információk */
    //Amennyiben valamely tárgyból 20% alatt teljesített a felvételiző, úgy sikertelen az érettségi eredménye és a pontszámítás nem lehetséges.

    //A jelentkezőknek a következő tárgyakból kötelező érettségi vizsgát tennie: magyar nyelv és irodalom, történelem és matematika egyéb esetben a pontszámítás nem lehetséges.

    //Az érettségi tantárgynak létezik típusa, amely vagy közép, vagy emelt szintű lehet.

    //Minden szaknak megvan a maga tárgyi követelményrendszere, amely meghatározza, hogy mely tárgyakat kell figyelembe venni az alappontok kiszámításához.

    /* Alappontok számítása */

    //Kötelező tárgy: amelyből mindenképpen érettségit kell tennie a jelentkezőnek

    //Kötelezően választható tárgyak: olyan tárgyak összesége, amelyből a jelentkező döntheti el, hogy mely tárgyból vagy tárgyakból szeretne érettségi vizsgát tenni. Egy tárgyat mindenképpen választani kell.

    //Amennyiben a kötelező tárgyból, vagy egyetlen kötelezően választható tárgyból sem tett érettségit a hallgató, úgy a pontszámítás nem lehetséges

    //Az alappontszám megállapításához csak a kötelező tárgy pontértékét és a legjobban sikerült kötelezően választható tárgy pontértékét kell összeadni és az így kapott összeget megduplázni.

    /* Többletpontok számítása */

    //Nyelvtudás

    //Nyelv kivétel - Amennyiben a jelentkező egyazon nyelvből tett le több sikeres nyelvvizsgát, úgy a többletpontszámítás során egyszer kerülnek kiértékelésre a nagyobb pontszám függvényében (pl.: angol B2 és angol C1 összértéke 40 pont lesz). 

    //Emelt szintű érettségi

    //A többletpontok összege 0 és legfeljebb 100 pont között lehetséges abban az esetben is, ha a jelentkező különböző jogcímek alapján elért többletpontjainak az összege ezt meghaladná.

    //Az összpontszámot az alappontok és többletpontok összege adja meg.
    
}
