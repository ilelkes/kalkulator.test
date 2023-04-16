<x-layout>
    <div class="row g-5 py-5">
        <div class="col-12 d-flex flex-column align-items-start gap-2">
            <h3 class="fw-bold">Teszt adatok</h3>
            <a href="{{ route('inputs.main') }}" class="btn btn-secondary">Vissza a kezdőoldalra</a>
            <p>A kapott fix esetek mellett módosítható teszt adatok - public mappában található 'homework_input_datas.php' tömb. A public mappában található 'homework_input_szak.php' körültekintő módosításával újabb szakok követelményei is megadhatóak.</p>
        </div>
        <div class="col-12 mt-1">
            @php
                $_SESSION = [];
                $_SESSION['emelt_szintu_erettsegi_pontszam'] = 0;
                $_SESSION['nyelvtudas_pontszam'] = 0;
                
                //A fix esetek mellett módosítható teszt adatok
                require public_path('homework_input_datas.php');
                
                foreach ($exampleData as $index => $test_array) {
                    $exampleData[$index]['id'] = $index;
                    $exampleData[$index]['title'] = $test_array['valasztott-szak']['egyetem'] . ' ' . $test_array['valasztott-szak']['kar'] . ' ' . $test_array['valasztott-szak']['szak'] . ' - #' . $index;
                }
            @endphp

            @unless (count($exampleData) == 0)
                @foreach ($exampleData as $input)
                    <x-input-div-test :input="$input" />
                @endforeach
            @else
                <p>Nem található tesztadat.</p>
            @endunless
        </div>
    </div>
</x-layout>
