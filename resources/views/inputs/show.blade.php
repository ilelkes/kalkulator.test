<x-layout>
    <div class="row row-cols-1 g-5 py-5">
        <div class="col d-flex flex-column align-items-start gap-2">
            <h3 class="fw-bold">Példa adat</h3>
            <p class="text-body-secondary"><a href="{{ route('inputs.index') }}" class="btn btn-secondary">Vissza az
                    adatokhoz</a></p>
        </div>
        <div class="col mt-1">
            <div class="row">
                @unless (!isset($input) || count($input) == 0)
                    <x-input-show :input="$input" />
                @else
                    <p>Nem található ez a tesztadat.</p>
                @endunless
            </div>
        </div>
    </div>
</x-layout>
