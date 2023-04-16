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

    public function test_inputs_show_id_from_1_to_4_route_exist_and_there_are_some_data(): void
    {
        for ($id = 1; $id <= 4; $id++) {
            $response = $this->get(route('inputs.show', $id));

            $response->assertStatus(200);
            $response->assertSee(__('Vissza az adatokhoz'));
            $response->assertDontSee(__('Nem található ez a tesztadat.'));
        }
    }

    /* Alap információk */
    //Amennyiben valamely tárgyból 20% alatt teljesített a felvételiző, úgy sikertelen az érettségi eredménye és a pontszámítás nem lehetséges.
    public function test_inputs_show_id4_route_exist_and_there_are_some_min_20_percent_failed_data(): void
    {
        $response = $this->get(route('inputs.show', '4'));

        $response->assertStatus(200);
        $response->assertSee(__('Vissza az adatokhoz'));
        $response->assertSee(__('tárgyból elért 20% alatti eredmény miatt'));
        $response->assertDontSee(__('Nem található ez a tesztadat.'));
    }

    //A jelentkezőknek a következő tárgyakból kötelező érettségi vizsgát tennie: magyar nyelv és irodalom, történelem és matematika egyéb esetben a pontszámítás nem lehetséges.
    public function test_inputs_show_id3_route_exist_and_there_are_not_min_requirements(): void
    {
        $response = $this->get(route('inputs.show', '3'));

        $response->assertStatus(200);
        $response->assertSee(__('Vissza az adatokhoz'));
        $response->assertSee(__('hiba, nem lehetséges a pontszámítás a kötelező érettségi tárgyak hiánya miatt'));
        $response->assertDontSee(__('Nem található ez a tesztadat.'));
    }

    //Az érettségi tantárgynak létezik típusa, amely vagy közép, vagy emelt szintű lehet. Minden szaknak megvan a maga tárgyi követelményrendszere, amely meghatározza, hogy mely tárgyakat kell figyelembe venni az alappontok kiszámításához.
    /*
    A könnyebbség kedvéért a feladathoz csak az itt megadott két szak érettségi követelményrendszerét kell figyelembe venni.
    
    Az ELTE IK - Programtervező informatikus:
    - Kötelező: matematika
    - Kötelezően választható: biológia vagy fizika vagy informatika vagy kémia
    
    A PPKE BTK – Anglisztika:
    - Kötelező: angol (emelt szinten)
    - Kötelezően választható: francia vagy német vagy olasz vagy orosz vagy spanyol vagy történelem
    */

    public function test_inputs_show_id2_route_exist_and_there_are_faculty_requirements(): void
    {
        $response = $this->get(route('inputs.show', '2'));

        $response->assertStatus(200);
        $response->assertSee(__('Vissza az adatokhoz'));
        $response->assertDontSee(__('hiba, nem elérhetőek a választott szak pontszámításához a követelmények'));
        $response->assertDontSee(__('Nem található ez a tesztadat.'));
    }

    /* Alappontok számítása */

    //Kötelező tárgy: amelyből mindenképpen érettségit kell tennie a jelentkezőnek
    public function test_inputs_show_id1_route_exist_and_there_are_faculty_requirements_and_is_grade(): void
    {
        $response = $this->get(route('inputs.show', '1'));

        $response->assertStatus(200);
        $response->assertSee(__('Vissza az adatokhoz'));
        $response->assertDontSee(__('hiba, nem teljesített kötelező tárgyat a szakhoz'));
        $response->assertDontSee(__('hiba, nem teljesített megfelelő érettségi szintet a szakhoz'));
        $response->assertDontSee(__('Nem található ez a tesztadat.'));
    }
    
    //Kötelezően választható tárgyak: olyan tárgyak összesége, amelyből a jelentkező döntheti el, hogy mely tárgyból vagy tárgyakból szeretne érettségi vizsgát tenni. Egy tárgyat mindenképpen választani kell.
    public function test_inputs_show_id1_route_exist_and_there_are_faculty_optional_requirements_and_is_grade(): void
    {
        $response = $this->get(route('inputs.show', '1'));

        $response->assertStatus(200);
        $response->assertSee(__('Vissza az adatokhoz'));
        $response->assertDontSee(__('hiba, nem teljesített kötelezően választható tárgyat a szakhoz'));
        $response->assertDontSee(__('Nem található ez a tesztadat.'));
    }

    //Amennyiben a kötelező tárgyból, vagy egyetlen kötelezően választható tárgyból sem tett érettségit a hallgató, úgy a pontszámítás nem lehetséges
    public function test_inputs_show_id1_route_exist_and_there_are_faculty_full_requirements_and_is_grade(): void
    {
        $response = $this->get(route('inputs.show', '1'));

        $response->assertStatus(200);
        $response->assertSee(__('Vissza az adatokhoz'));
        $response->assertDontSee(__('hiba, nem teljesített kötelező tárgyat a szakhoz'));
        $response->assertDontSee(__('hiba, nem teljesített megfelelő érettségi szintet a szakhoz'));
        $response->assertDontSee(__('hiba, nem teljesített kötelezően választható tárgyat a szakhoz'));
        $response->assertDontSee(__('Nem található ez a tesztadat.'));
    }

    //Az alappontszám megállapításához csak a kötelező tárgy pontértékét és a legjobban sikerült kötelezően választható tárgy pontértékét kell összeadni és az így kapott összeget megduplázni.
    public function test_inputs_show_id1_route_exist_and_there_are_basic_score(): void
    {
        $response = $this->get(route('inputs.show', '1'));

        $response->assertStatus(200);
        $response->assertSee(__('Vissza az adatokhoz'));
        $response->assertSee(__('Megállapított alappontszám:'));
        $response->assertDontSee(__('Nem található ez a tesztadat.'));
    }

    /* Többletpontok számítása */

    //Nyelvtudás

    //Nyelv kivétel - Amennyiben a jelentkező egyazon nyelvből tett le több sikeres nyelvvizsgát, úgy a többletpontszámítás során egyszer kerülnek kiértékelésre a nagyobb pontszám függvényében (pl.: angol B2 és angol C1 összértéke 40 pont lesz). 

    //Emelt szintű érettségi

    //A többletpontok összege 0 és legfeljebb 100 pont között lehetséges abban az esetben is, ha a jelentkező különböző jogcímek alapján elért többletpontjainak az összege ezt meghaladná.

    //Az összpontszámot az alappontok és többletpontok összege adja meg.

}
