<x-layout>
    <div class="row row-cols-1 g-5 py-5">
        <div class="col d-flex flex-column align-items-start gap-2">
            <h3 class="fw-bold">Teszt adat</h3>
            <p class="text-body-secondary">
                <a href="{{ route('inputs.testarray') }}" class="btn btn-secondary">Vissza a teszt adatokhoz</a>
            </p>
        </div>
        <div class="col mt-1">
            <div class="row">
                @php
                    $_SESSION = [];
                    $_SESSION['emelt_szintu_erettsegi_pontszam'] = 0;
                    $_SESSION['nyelvtudas_pontszam'] = 0;
                    
                    //A fix esetek mellett módosítható teszt adatok
                    require public_path('homework_input_datas.php');
                    
                    foreach ($exampleData as $index => $test_array) {
                        $exampleData[$index]['id'] = $index;
                        $exampleData[$index]['title'] = $test_array['valasztott-szak']['egyetem'] . ' ' . $test_array['valasztott-szak']['kar'] . ' ' . $test_array['valasztott-szak']['szak'] . ' - #' . $index;
                    
                        if ($id == $index) {
                            $input = $exampleData[$index];
                        }
                    }
                @endphp

                @unless (!isset($input) || count($input) == 0)
                    <x-input-show-test :input="$input" />
                @else
                    <p>Nem található ez a tesztadat.</p>
                @endunless
            </div>
        </div>
    </div>
</x-layout>
