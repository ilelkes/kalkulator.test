@props(['input'])

<div class="col d-flex flex-column gap-2 data-item">
    <h4 class="fw-semibold mb-0">{{ $input['title'] }}</h4>
    <p class="text-body-secondary">{{ $input['description'] }}</p>

    {{-- A feladathoz kapott php --}}
    @php
        //A kapott php adatokkal, tömbökkel - A második $exampleData tömböt átneveztem $exampleData1-re, más módosítás nem történt
        require public_path('homework_input.php');

        //Az adott tömbben lévő értékek megjelenítése - Ellenőrzés céljából
        $actArray = $input['title'];
        print_r($$actArray["valasztott-szak"]);
        print('<hr>');
        print_r($$actArray["erettsegi-eredmenyek"]);
        print('<hr>');
        print_r($$actArray["tobbletpontok"]);
    @endphp
    {{-- A feladathoz kapott php --}}

</div>
